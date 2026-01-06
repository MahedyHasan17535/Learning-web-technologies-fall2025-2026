<?php
require_once('../controller/adminCheck.php');
require_once('../model/patientModel.php');

$patients = getAllPatients();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Bill - Hospital Management System</title>
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

<body>
    <!-- Navbar -->
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="dashboard_admin.php" class="navbar-link">Dashboard</a>
        <a href="bill_list.php" class="navbar-link">Bills</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <div class="main-container">
        <h2>Create New Bill</h2>

        <form method="POST" action="../controller/add_bill.php">
            <fieldset>
                <legend>Patient Details</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Select Patient:</td>
                        <td>
                            <select name="patient_id" required>
                                <option value="">-- Select Patient --</option>
                                <?php foreach ($patients as $p): ?>
                                    <?php $user = getUserById($p['user_id']); ?>
                                    <option value="<?php echo $p['id']; ?>">
                                        <?php echo $user['full_name']; ?> (Patient #<?php echo $p['id']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Notes:</td>
                        <td><textarea name="notes" rows="2"></textarea></td>
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
                    <tr>
                        <td><input type="text" name="item_description[]" required></td>
                        <td><input type="number" name="quantity[]" value="1" min="1" onchange="calcTotal()"></td>
                        <td><input type="number" name="unit_price[]" step="0.01" value="0.00" onchange="calcTotal()">
                        </td>
                        <td><span class="subtotal">0.00</span></td>
                        <td><button type="button" onclick="removeItem(this)">Remove</button></td>
                    </tr>
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
                        <td><input type="number" id="discount" name="discount" value="0" onchange="calcTotal()"></td>
                    </tr>
                    <tr>
                        <td>Tax (%):</td>
                        <td><input type="number" id="tax" name="tax" value="0" onchange="calcTotal()"></td>
                    </tr>
                    <tr>
                        <td><strong>Grand Total:</strong></td>
                        <td><strong id="grand_total">0.00</strong></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <input type="submit" name="submit" value="Create Bill">
            <a href="bill_list.php"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>

</html>