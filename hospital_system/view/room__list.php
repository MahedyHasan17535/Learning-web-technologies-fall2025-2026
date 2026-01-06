<?php
require_once('../controller/adminCheck.php');
require_once('../model/roomModel.php');

$rooms = getAllRooms();
?>

<html>

<head>
    <title>Room List - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="main-container">
        <h2>Room Management</h2>

        <table>
            <tr>
                <td>
                    <a href="room_add.php"><button type="button">Add New Room</button></a>
                </td>
            </tr>
        </table>

        <br>

        <fieldset>
            <legend>Room Inventory</legend>
            <table border=1 width="100%">
                <tr>
                    <th>ID</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Floor</th>
                    <th>Capacity</th>
                    <th>Price/Day</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php if (count($rooms) > 0): ?>
                    <?php foreach ($rooms as $room): ?>
                        <tr>
                            <td>
                                <?php echo $room['id']; ?>
                            </td>
                            <td>
                                <?php echo $room['room_number']; ?>
                            </td>
                            <td>
                                <?php echo $room['room_type']; ?>
                            </td>
                            <td>
                                <?php echo $room['floor']; ?>
                            </td>
                            <td>
                                <?php echo $room['capacity']; ?>
                            </td>
                            <td>
                                <?php echo number_format($room['price_per_day'], 2); ?>
                            </td>
                            <td style="<?php echo $room['status'] == 'Available' ? 'color: green; font-weight: bold;' : 'color: orange; font-weight: bold;'; ?>">
                                <?php echo $room['status']; ?>
                            </td>
                            <td>
                                <a href="room_view.php?id=<?php echo $room['id']; ?>"><button>View</button></a>
                                <a href="room_edit.php?id=<?php echo $room['id']; ?>"><button>Edit</button></a>
                                <a href="../controller/delete_room.php?id=<?php echo $room['id']; ?>"
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