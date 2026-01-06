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
    <title>View Room - Hospital Management System</title>
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
        <h2>Room Details: <?php echo $room['room_number']; ?></h2>

        <fieldset>
            <legend>General Room Information</legend>
            <table cellpadding="5">
                <tr>
                    <td><strong>Room ID:</strong></td>
                    <td><?php echo $room['id']; ?></td>
                </tr>
                <tr>
                    <td><strong>Room Number:</strong></td>
                    <td><?php echo $room['room_number']; ?></td>
                </tr>
                <tr>
                    <td><strong>Room Type:</strong></td>
                    <td><?php echo $room['room_type'] ? $room['room_type'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <td><strong>Floor:</strong></td>
                    <td><?php echo $room['floor'] ? $room['floor'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <td><strong>Capacity:</strong></td>
                    <td><?php echo $room['capacity'] ? $room['capacity'] : 'N/A'; ?> Persons</td>
                </tr>
                <tr>
                    <td><strong>Description:</strong></td>
                    <td><?php echo $room['description'] ? $room['description'] : 'N/A'; ?></td>
                </tr>
            </table>
        </fieldset>

        <br>

        <fieldset>
            <legend>Pricing & Facilities</legend>
            <table cellpadding="5">
                <tr>
                    <td><strong>Price Per Day:</strong></td>
                    <td><?php echo number_format($room['price_per_day'], 2); ?> Tk</td>
                </tr>
                <tr>
                    <td><strong>Facilities:</strong></td>
                    <td><?php echo $room['facilities'] ? $room['facilities'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <td><strong>Status:</strong></td>
                    <td style="<?php echo $room['status'] == 'Available' ? 'color: green; font-weight: bold;' : 'color: orange; font-weight: bold;'; ?>">
                        <?php echo $room['status']; ?>
                        <?php if ($room['status'] == 'Under Maintenance'): ?>
                            (Not Ready)
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </fieldset>

        <br>

        <div>
            <a href="room_edit.php?id=<?php echo $room['id']; ?>"><button>Edit</button></a>
            <a href="room_list.php"><button>Back to List</button></a>
        </div>
    </div>
</body>

</html>