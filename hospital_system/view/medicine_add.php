<?php
require_once('../controller/adminCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Medicine - Hospital Management System</title>
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
        <h2>Add New Medicine</h2>

        <form method="POST" action="../controller/add_medicine.php" onsubmit="return validateMedicineForm(this)">
            <fieldset>
                <legend>Medicine Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Medicine Name:</td>
                        <td><input type="text" name="medicine_name" onblur="validateMedicineName(this)"></td>
                    </tr>
                    <tr>
                        <td>Generic Name:</td>
                        <td><input type="text" name="generic_name" onblur="validateGenericName(this)"></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category" onblur="validateCategory(this)">
                                <option value="">-- Select --</option>
                                <option value="Antibiotic">Antibiotic</option>
                                <option value="Painkiller">Painkiller</option>
                                <option value="Antiviral">Antiviral</option>
                                <option value="Vitamin">Vitamin</option>
                                <option value="Other">Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="description" rows="3" cols="40"></textarea></td>
                    </tr>
                    <tr>
                        <td>Manufacturer:</td>
                        <td><input type="text" name="manufacturer" onblur="validateManufacturer(this)"></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <fieldset>
                <legend>Stock Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Unit Price:</td>
                        <td><input type="number" name="unit_price" step="0.01" onblur="validateUnitPrice(this)"></td>
                    </tr>
                    <tr>
                        <td>Stock Quantity:</td>
                        <td><input type="number" name="stock_quantity" onblur="validateStockQuantity(this)"></td>
                    </tr>
                    <tr>
                        <td>Reorder Level:</td>
                        <td><input type="number" name="reorder_level" onblur="validateReorderLevel(this)"></td>
                    </tr>
                    <tr>
                        <td>Expiry Date:</td>
                        <td><input type="date" name="expiry_date" onblur="validateExpiryDate(this)"></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <div>
                <input type="submit" name="submit" value="Add Medicine">
                <a href="medicine_list.php"><button type="button">Cancel</button></a>
            </div>
        </form>
    </div>
    <script src="../assets/js/medicine_validation.js"></script>
</body>
</html>