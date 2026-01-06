<?php
require_once('../controller/adminCheck.php');
require_once('../model/medicineModel.php');

// Get medicine ID
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
    <title>Edit Medicine - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="dashboard_admin.php" class="navbar-link">Dashboard</a>
        <a href="profile_view.php" class="navbar-link">My Profile</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <!-- Edit Medicine Form -->
    <div class="main-container">
        <h2>Edit Medicine:
            <?php echo $medicine['medicine_name']; ?>
        </h2>

        <form method="POST" action="../controller/edit_medicine.php" onsubmit="return validateMedicineForm(this)">
            <input type="hidden" name="id" value="<?php echo $medicine['id']; ?>">

            <fieldset>
                <legend>Medicine Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Medicine Name:</td>
                        <td><input type="text" name="medicine_name" value="<?php echo $medicine['medicine_name']; ?>"
                                required></td>
                    </tr>
                    <tr>
                        <td>Generic Name:</td>
                        <td><input type="text" name="generic_name" value="<?php echo $medicine['generic_name']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                                <option value="">-- Select --</option>
                                <option value="Antibiotic" <?php if ($medicine['category'] == 'Antibiotic')
                                    echo 'selected'; ?>>Antibiotic</option>
                                <option value="Painkiller" <?php if ($medicine['category'] == 'Painkiller')
                                    echo 'selected'; ?>>Painkiller</option>
                                <option value="Antiviral" <?php if ($medicine['category'] == 'Antiviral')
                                    echo 'selected'; ?>>Antiviral</option>
                                <option value="Vitamin" <?php if ($medicine['category'] == 'Vitamin')
                                    echo 'selected'; ?>
                                    >Vitamin</option>
                                <option value="Antiseptic" <?php if ($medicine['category'] == 'Antiseptic')
                                    echo 'selected'; ?>>Antiseptic</option>
                                <option value="Antacid" <?php if ($medicine['category'] == 'Antacid')
                                    echo 'selected'; ?>
                                    >Antacid</option>
                                <option value="Antihistamine" <?php if ($medicine['category'] == 'Antihistamine')
                                    echo 'selected'; ?>>Antihistamine</option>
                                <option value="Antidepressant" <?php if ($medicine['category'] == 'Antidepressant')
                                    echo 'selected'; ?>>Antidepressant</option>
                                <option value="Other" <?php if ($medicine['category'] == 'Other')
                                    echo 'selected'; ?>
                                    >Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="description" rows="3"
                                cols="40"><?php echo $medicine['description']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Manufacturer:</td>
                        <td><input type="text" name="manufacturer" value="<?php echo $medicine['manufacturer']; ?>">
                        </td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <fieldset>
                <legend>Stock Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Unit Price:</td>
                        <td><input type="number" name="unit_price" step="0.01" min="0"
                                value="<?php echo $medicine['unit_price']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Stock Quantity:</td>
                        <td><input type="number" name="stock_quantity" min="0"
                                value="<?php echo $medicine['stock_quantity']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Reorder Level:</td>
                        <td><input type="number" name="reorder_level" min="0"
                                value="<?php echo $medicine['reorder_level']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Expiry Date:</td>
                        <td><input type="date" name="expiry_date" value="<?php echo $medicine['expiry_date']; ?>"></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <div>
                <input type="submit" name="submit" value="Update Medicine">
                <a href="medicine_list.php"><button type="button">Cancel</button></a>
            </div>
        </form>
    </div>
    <script src="../assets/js/validation-helpers.js"></script>
    <script src="../assets/js/validation-fields.js"></script>
</body>

</html>