<?php
require_once('../controller/adminCheck.php');
require_once('../model/billModel.php');
require_once('../model/patientModel.php');

$id = $_REQUEST['id'];
$bill = getBillById($id);
$items = getBillItems($id);
$patients = getAllPatients();

if (!$bill) {
    echo "Bill not found";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Bill - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script>
        function addItem() {
            var table = document.getElementById("items_table");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            cell1.innerHTML = '<input type="text" name="item_description[]" required>';
            cell2.innerHTML = '<input type="number" name="quantity[]" value="1" min="1" onchange="calcTotal()">';
            cell3.innerHTML = '<input type="number" name="unit_price[]" step="0.01" value="0.00" onchange="calcTotal()">';
            cell4.innerHTML = '<span class="subtotal">0.00</span>';
            cell5.innerHTML = '<button type="button" onclick="removeItem(this)">Remove</button>';
        }

        function removeItem(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
            calcTotal();
        }

        function calcTotal() {
            var quantities = document.getElementsByName("quantity[]");
            var prices = document.getElementsByName("unit_price[]");
            var subtotals = document.getElementsByClassName("subtotal");
            var total = 0;

            for (var i = 0; i < quantities.length; i++) {
                var qty = parseFloat(quantities[i].value) || 0;
                var price = parseFloat(prices[i].value) || 0;
                var sub = qty * price;
                subtotals[i].innerText = sub.toFixed(2);
                total += sub;
            }

            var discount = parseFloat(document.getElementById("discount").value) || 0;
            var tax = parseFloat(document.getElementById("tax").value) || 0;

            var discountAmount = (total * discount) / 100;
            var afterDiscount = total - discountAmount;
            var taxAmount = (afterDiscount * tax) / 100;
            var finalTotal = afterDiscount + taxAmount;

            document.getElementById("grand_total").innerText = finalTotal.toFixed(2);
        }
    </script>
</head>

<body onload="calcTotal()">
    <!-- Navbar -->
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="dashboard_admin.php" class="navbar-link">Dashboard</a>
        <a href="bill_list.php" class="navbar-link">Bills</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <div class="main-container">
        <h2>Edit Bill #
            <?php echo $bill['id']; ?>
        </h2>

        <form method="POST" action="../controller/edit_bill.php">
            <input type="hidden" name="id" value="<?php echo $bill['id']; ?>">
            <fieldset>
                <legend>Patient Details</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Patient:</td>
                        <td>
                            <!-- Patient cannot be changed to avoid data inconsistency with payments etc ideally, 
                                 or we allow it. Let's make it disabled for simplicity/safety -->
                            <input type="text" value="<?php echo $bill['patient_name']; ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Notes:</td>
                        <td><textarea name="notes" rows="2"><?php echo $bill['notes']; ?></textarea></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <fieldset>
                <legend>Bill Items</legend>
                <table id="items_table" border="1" cellpadding="5" width="100%">
                    <tr>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><input type="text" name="item_description[]"
                                    value="<?php echo $item['item_description']; ?>" required></td>
                            <td><input type="number" name="quantity[]" value="<?php echo $item['quantity']; ?>" min="1"
                                    onchange="calcTotal()"></td>
                            <td><input type="number" name="unit_price[]" step="0.01"
                                    value="<?php echo $item['unit_price']; ?>" onchange="calcTotal()"></td>
                            <td><span class="subtotal">0.00</span></td>
                            <td><button type="button" onclick="removeItem(this)">Remove</button></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <button type="button" onclick="addItem()">+ Add Item</button>
            </fieldset>

            <br>

            <fieldset>
                <legend>Summary</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Discount (%):</td>
                        <td><input type="number" id="discount" name="discount" value="<?php echo $bill['discount']; ?>"
                                onchange="calcTotal()"></td>
                    </tr>
                    <tr>
                        <td>Tax (%):</td>
                        <td><input type="number" id="tax" name="tax" value="<?php echo $bill['tax']; ?>"
                                onchange="calcTotal()"></td>
                    </tr>
                    <tr>
                        <td><strong>Grand Total:</strong></td>
                        <td><strong id="grand_total">
                                <?php echo $bill['total_amount']; ?>
                            </strong></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <input type="submit" name="update" value="Update Bill">
            <a href="bill_view.php?id=<?php echo $bill['id']; ?>"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>

</html>