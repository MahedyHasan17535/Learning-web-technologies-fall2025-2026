<?php
require_once('../controller/adminCheck.php');
require_once('../model/roomModel.php');

if (!isset($_GET['id'])) {
    header('location: room_list.php');
    exit();
}

$room = getRoomById($_GET['id']);

if (!$room) {
    header('location: room_list.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Room - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="room_list.php" class="navbar-link">Room Home</a>
        <a href="profile_view.php" class="navbar-link">My Profile</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <div class="main-container">
        <h2>Edit Room: <?php echo $room['room_number']; ?></h2>

        <form method="POST" action="../controller/edit_room.php" onsubmit="return validateRoomForm(this)">
            <input type="hidden" name="id" value="<?php echo $room['id']; ?>">

            <fieldset>
                <legend>General Room Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Room Number:</td>
                        <td><input type="text" name="room_number" value="<?php echo $room['room_number']; ?>" onblur="validateRoomNumber(this)"></td>
                    </tr>
                    <tr>
                        <td>Room Type:</td>
                        <td>
                            <select name="room_type" onblur="validateRoomType(this)">
                                <option value="">-- Select --</option>
                                <option value="General Ward" <?php if ($room['room_type'] == 'General Ward') echo 'selected'; ?>>General Ward</option>
                                <option value="Private Room" <?php if ($room['room_type'] == 'Private Room') echo 'selected'; ?>>Private Room</option>
                                <option value="ICU" <?php if ($room['room_type'] == 'ICU') echo 'selected'; ?>>ICU</option>
                                <option value="Operation Theater" <?php if ($room['room_type'] == 'Operation Theater') echo 'selected'; ?>>Operation Theater</option>
                                <option value="Emergency" <?php if ($room['room_type'] == 'Emergency') echo 'selected'; ?>>Emergency</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                      <td>Floor:</td>
                      <td>
                       <select name="floor" onblur="validateFloor(this)">
                            <option value="">-- Select Floor --</option>
                            <option value="1" <?php if ($room['floor'] == '1') echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($room['floor'] == '2') echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($room['floor'] == '3') echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($room['floor'] == '4') echo 'selected'; ?>>4</option>
                            <option value="5" <?php if ($room['floor'] == '5') echo 'selected'; ?>>5</option>
                            <option value="6" <?php if ($room['floor'] == '6') echo 'selected'; ?>>6</option>
                            <option value="7" <?php if ($room['floor'] == '7') echo 'selected'; ?>>7</option>
                      </select>
                     </td>
                    </tr>
                    <tr>
                        <td>Capacity:</td>
                        <td><input type="number" name="capacity" value="<?php echo $room['capacity']; ?>" min="1" onblur="validateCapacity(this)"></td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <fieldset>
                <legend>Pricing & Facilities</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Price Per Day:</td>
                        <td><input type="number" name="price_per_day" step="0.01" value="<?php echo $room['price_per_day']; ?>" onblur="validatePrice(this)"></td>
                    </tr>
                    <tr>
                        <td>Facilities:</td>
                        <td><input type="text" name="facilities" value="<?php echo $room['facilities']; ?>" onblur="validateFacilities(this)"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="description" rows="3" cols="40"><?php echo $room['description']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status" onblur="validateStatus(this)">
                                <option value="Available" <?php if ($room['status'] == 'Available') echo 'selected'; ?>>Available</option>
                                <option value="Occupied" <?php if ($room['status'] == 'Occupied') echo 'selected'; ?>>Occupied</option>
                                <option value="Under Maintenance" <?php if ($room['status'] == 'Under Maintenance') echo 'selected'; ?>>Under Maintenance</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <br>

            <div>
                <input type="submit" name="submit" value="Update Room">
                <a href="room_list.php"><button type="button">Cancel</button></a>
            </div>
        </form>
    </div>
    
    <script src="../assets/js/room_validation.js"></script>
</body>

</html>