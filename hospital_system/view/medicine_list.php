<?php
require_once('../controller/adminCheck.php');
require_once('../model/medicineModel.php');


$medicines = getAllMedicines();
?>

<html>

<head>
    <title>Medicine List - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="main-container">
        <h2>Medicine Management</h2>

        
            <table>
                <tr>
                    <td>
                        <a href="medicine_add.php"><button type="button">Add New Medicine</button></a>
                    </td>
                </tr>
            </table>

        <br>

        <fieldset>
            <legend>Medicine Inventory</legend>
            <table border=1 width="100%">
                <tr>
                    <th>ID</th>
                    <th>Medicine Name</th>
                    <th>Generic Name</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Stock</th>
                    <th>Expiry Date</th>
                    <th>Actions</th>
                </tr>
                <?php if (count($medicines) > 0): ?>
                    <?php foreach ($medicines as $medicine): ?>
                        <tr>
                            <td>
                                <?php echo $medicine['id']; ?>
                            </td>
                            <td>
                                <?php echo $medicine['medicine_name']; ?>
                            </td>
                            <td>
                                <?php echo $medicine['generic_name']; ?>
                            </td>
                            <td>
                                <?php echo $medicine['category']; ?>
                            </td>
                            <td>
                                <?php echo number_format($medicine['unit_price'], 2); ?>
                            </td>
                            <td
                                style="<?php echo $medicine['stock_quantity'] <= $medicine['reorder_level'] ? 'color: red; font-weight: bold;' : ''; ?>">
                                <?php echo $medicine['stock_quantity']; ?>
                            </td>
                            <td>
                                <?php echo $medicine['expiry_date']; ?>
                            </td>
                            <td>
                                <a href="medicine_view.php?id=<?php echo $medicine['id']; ?>"><button>View</button></a>
                                <a href="medicine_edit.php?id=<?php echo $medicine['id']; ?>"><button>Edit</button></a>
                                <a href="../controller/delete_medicine.php?id=<?php echo $medicine['id']; ?>"
                                    onclick="return confirm('Are you sure?');"><button>Delete</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </fieldset>
    </div>
</body>

</html>