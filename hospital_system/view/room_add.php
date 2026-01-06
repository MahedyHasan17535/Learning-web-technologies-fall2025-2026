<?php
require_once('../controller/adminCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Room - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="room_list.php" class="navbar-link">Room Home</a>
        <a href="medicine_list.php" class="navbar-link">Medicine List</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <div class="main-container">
        <h2>Add New Room</h2>

        <form method="POST" action="../controller/add_room.php" onsubmit="return validateRoomForm(this)">
            <fieldset>
                <legend>General Room Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Room Number:</td>
                        <td><input type="text" name="room_number" onblur="validateRoomNumber(this)"></td>
                    </tr>
                    <tr>
                        <td>Room Type:</td>
                        <td>
                            <select name="room_type" onblur="validateRoomType(this)">
                                <option value="">-- Select --</option>
                                <option value="General Ward">General Ward</option>
                                <option value="Private Room">Private Room</option>
                                <option value="ICU">ICU</option>
                                <option value="Operation Theater">Operation Theater</option>
                                <option value="Emergency">Emergency</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Floor:</td>
                        <td>
                            <select name="floor" onblur="validateFloor(this)">
                                <option value="">-- Select Floor --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Capacity:</td>
                        <td><input type="number" name="capacity" min="1" onblur="validateCapacity(this)"></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <fieldset>
                <legend>Pricing & Facilities</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Price Per Day:</td>
                        <td><input type="number" name="price_per_day" step="0.01" onblur="validatePrice(this)"></td>
                    </tr>
                    <tr>
                        <td>Facilities:</td>
                        <td><input type="text" name="facilities" placeholder="e.g. AC, TV, WiFi" onblur="validateFacilities(this)"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="description" rows="3" cols="40"></textarea></td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status" onblur="validateStatus(this)">
                                <option value="Available">Available</option>
                                <option value="Occupied">Occupied</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <div>
                <input type="submit" name="submit" value="Add Room">
                <a href="room_list.php"><button type="button">Cancel</button></a>
            </div>
        </form>
    </div>
    <script src="../assets/js/room_validation.js"></script>
</body>
</html>