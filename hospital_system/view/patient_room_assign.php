<?php
require_once('../controller/adminCheck.php');
require_once('../model/roomModel.php');

$rooms = getAllRooms(); 
$patients = getAllPatients(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assign Patient - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="navbar">
        <span class="navbar-title">Hospital Management System</span>
        <a href="room_list.php" class="navbar-link">Room Home</a>
        <a href="../controller/logout.php" class="navbar-link">Logout</a>
    </div>

    <div class="main-container">
        <h2>Assign Patient to Room</h2>

        <form method="POST" action="../controller/assign_patient.php">
            <fieldset>
                <legend>Assignment Information</legend>
                <table cellpadding="5">
                    <tr>
                        <td>Select Patient:</td>
                        <td>
                            <select name="patient_id">
                                <option value="">-- Select Patient --</option>
                                <?php foreach($patients as $p): ?>
                                    <option value="<?php echo $p['user_id']; ?>">
                                        ID: <?php echo $p['user_id']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Select Room:</td>
                        <td>
                            <select name="room_id">
                                <option value="">-- Select Room --</option>
                                <?php foreach($rooms as $r): ?>
                                    <?php if($r['status'] == 'Available'): ?>
                                        <option value="<?php echo $r['id']; ?>">
                                            Room: <?php echo $r['room_number']; ?> (Floor <?php echo $r['floor']; ?>)
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <input type="submit" name="submit" value="Assign Room">
        </form>
    </div>
</body>
</html>