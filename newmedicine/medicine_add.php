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
    <!-- Navbar -->
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="dashboard_admin.php" class="navbar-link">Dashboard</a>
        <a href="profile_view.php" class="navbar-link">My Profile</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <!-- Add Medicine Form -->
    <div class="main-container">
        <h2>Add New Medicine</h2>

        <form method="POST" action="../controller/add_medicine.php" onsubmit="return validateMedicineForm(this)">
            <fieldset>
                <legend>Medicine Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Medicine Name:</td>
                        <td><input type="text" name="medicine_name" required onblur="validateName(this)"></td>
                    </tr>
                    <tr>
                        <td>Generic Name:</td>
                        <td><input type="text" name="generic_name"></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                                <option value="">-- Select --</option>
                                <option value="Antibiotic">Antibiotic</option>
                                <option value="Painkiller">Painkiller</option>
                                <option value="Antiviral">Antiviral</option>
                                <option value="Vitamin">Vitamin</option>
                                <option value="Antiseptic">Antiseptic</option>
                                <option value="Antacid">Antacid</option>
                                <option value="Antihistamine">Antihistamine</option>
                                <option value="Antidepressant">Antidepressant</option>
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
                        <td><input type="text" name="manufacturer"></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <fieldset>
                <legend>Stock Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Unit Price:</td>
                        <td><input type="number" name="unit_price" step="0.01" min="0" required></td>
                    </tr>
                    <tr>
                        <td>Stock Quantity:</td>
                        <td><input type="number" name="stock_quantity" min="0" value="0"></td>
                    </tr>
                    <tr>
                        <td>Reorder Level:</td>
                        <td><input type="number" name="reorder_level" min="0" value="10"></td>
                    </tr>
                    <tr>
                        <td>Expiry Date:</td>
                        <td><input type="date" name="expiry_date"></td>
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
    <script src="../assets/js/validation-helpers.js"></script>
    <script src="../assets/js/validation-fields.js"></script>
</body>

</html>