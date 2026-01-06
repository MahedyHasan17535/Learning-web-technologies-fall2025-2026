<?php
require_once('../controller/adminCheck.php');
require_once('../model/roomModel.php');

$rooms = getAllRooms();
$activeList = getActiveRoomAssignments();
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
                                <a href="patient_room_assign.php?id=<?php echo $room['id']; ?>"><button>Assign</button></a>
                                <a href="../controller/delete_room.php?id=<?php echo $room['id']; ?>"
                                    onclick="return confirm('Are you sure?');"><button>Delete</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </fieldset>

        <br><br>

       <fieldset>
    <legend><h3>Active Room Assignments</h3></legend>
    <table border="1" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr bgcolor="#f2f2f2">
                <th>Room No</th>
                <th>Patient ID</th>
                <th>Admission Date</th>
                <th>Expected Discharge</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($activeList) > 0): ?>
                <?php foreach($activeList as $row): ?>
                    <tr>
                        <td><?php echo $row['room_number']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['admission_date']; ?></td>
                        <td><?php echo ($row['expected_discharge_date'] == '0000-00-00') ? 'N/A' : $row['expected_discharge_date']; ?></td>
                        <td>
                            <a href="../controller/discharge_controller.php?id=<?php echo $row['assignment_id']; ?>">
                                <button type="button">Discharge</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" align="center">No active assignments found (Check if discharge_date is NULL in DB).</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</fieldset>
    </div>
</body>

</html>