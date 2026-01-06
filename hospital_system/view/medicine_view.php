<?php
require_once('../controller/adminCheck.php');
require_once('../model/medicineModel.php');

if (!isset($_GET['id'])) {
    header('location: medicine_list.php');
    exit();
}

$medicine = getMedicineById($_GET['id']);

if (!$medicine) {
    header('location: medicine_list.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Medicine - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="medicine_list.php" class="navbar-link">Medicine Home</a>
        <a href="profile_view.php" class="navbar-link">My Profile</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <div class="main-container">
        <h2>Medicine Details: <?php echo $medicine['medicine_name']; ?></h2>

        <fieldset>
            <legend>Medicine Information</legend>
            <table cellpadding="5">
                <tr>
                    <td><strong>Medicine ID:</strong></td>
                    <td><?php echo $medicine['id']; ?></td>
                </tr>
                <tr>
                    <td><strong>Medicine Name:</strong></td>
                    <td><?php echo $medicine['medicine_name']; ?></td>
                </tr>
                <tr>
                    <td><strong>Generic Name:</strong></td>
                    <td><?php echo $medicine['generic_name'] ? $medicine['generic_name'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <td><strong>Category:</strong></td>
                    <td><?php echo $medicine['category'] ? $medicine['category'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <td><strong>Manufacturer:</strong></td>
                    <td><?php echo $medicine['manufacturer'] ? $medicine['manufacturer'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <td><strong>Description:</strong></td>
                    <td><?php echo $medicine['description'] ? $medicine['description'] : 'N/A'; ?></td>
                </tr>
            </table>
        </fieldset>

        <br>

        <fieldset>
            <legend>Stock Information</legend>
            <table cellpadding="5">
                <tr>
                    <td><strong>Unit Price:</strong></td>
                    <td><?php echo number_format($medicine['unit_price'], 2); ?> Tk</td>
                </tr>
                <tr>
                    <td><strong>Stock Quantity:</strong></td>
                    <td style="<?php echo $medicine['stock_quantity'] <= $medicine['reorder_level'] ? 'color: red; font-weight: bold;' : ''; ?>">
                        <?php echo $medicine['stock_quantity']; ?>
                        <?php if ($medicine['stock_quantity'] <= $medicine['reorder_level']): ?>
                            (Low Stock!)
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Reorder Level:</strong></td>
                    <td><?php echo $medicine['reorder_level']; ?></td>
                </tr>
                <tr>
                    <td><strong>Expiry Date:</strong></td>
                    <td><?php echo $medicine['expiry_date'] ? $medicine['expiry_date'] : 'N/A'; ?></td>
                </tr>
            </table>
        </fieldset>

        <br>

        <div>
            <a href="medicine_edit.php?id=<?php echo $medicine['id']; ?>"><button>Edit</button></a>
            <a href="medicine_list.php"><button>Back to List</button></a>
        </div>
    </div>
</body>

</html>