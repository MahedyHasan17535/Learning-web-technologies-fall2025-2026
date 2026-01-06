<?php
require_once('db.php');

function getRoomById($id)
{
    $con = getConnection();
    $sql = "SELECT * FROM rooms WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function getAllRooms()
{
    $con = getConnection();
    $sql = "SELECT * FROM rooms ORDER BY room_number ASC";
    $result = mysqli_query($con, $sql);

    $rooms = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rooms[] = $row;
        }
    }

    return $rooms;
}
function dischargePatient($assignment_id) {
    $con = getConnection();
    $today = date('Y-m-d');

    $sql1 = "UPDATE room_assignments SET discharge_date = '{$today}' WHERE id = '{$assignment_id}'";
    
    if (mysqli_query($con, $sql1)) {
        $res = mysqli_query($con, "SELECT room_id FROM room_assignments WHERE id = '{$assignment_id}'");
        $data = mysqli_fetch_assoc($res);
        $room_id = $data['room_id'];

      
        $sql2 = "UPDATE rooms SET status = 'Available' WHERE id = '{$room_id}'";
        return mysqli_query($con, $sql2);
    }
    
    return false;
}

function getActiveRoomAssignments()
{
    $con = getConnection();
    $sql = "SELECT ra.id as assignment_id, r.room_number, p.name as patient_name, ra.admission_date, ra.expected_discharge_date 
            FROM room_assignments ra 
            JOIN rooms r ON ra.room_id = r.id
            JOIN patients p ON ra.patient_id = p.user_id 
            WHERE ra.discharge_date IS NULL"; 
            
    $result = mysqli_query($con, $sql);
    $assignments = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $assignments[] = $row;
        }
    }
    return $assignments;
}
function getAllPatients()
{
    $con = getConnection();

    $sql = "SELECT user_id FROM patients ORDER BY user_id ASC";
    $result = mysqli_query($con, $sql);

    $patients = array();
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $patients[] = $row;
        }
    }

    return $patients;
}
function updateRoomStatus($id, $status)
{
    $con = getConnection();
    $id = mysqli_real_escape_string($con, $id);
    $status = mysqli_real_escape_string($con, $status);

    $sql = "UPDATE rooms SET status='{$status}' WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getAvailableRooms()
{
    $con = getConnection();
    $sql = "SELECT * FROM rooms WHERE status='Available' ORDER BY room_number ASC";
    $result = mysqli_query($con, $sql);

    $rooms = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rooms[] = $row;
        }
    }

    return $rooms;
}

function addRoom($room)
{
    $con = getConnection();

    $room_number = mysqli_real_escape_string($con, $room['room_number']);
    $room_type = mysqli_real_escape_string($con, $room['room_type']);
    $floor = mysqli_real_escape_string($con, $room['floor']);
    $capacity = mysqli_real_escape_string($con, $room['capacity']);
    $price_per_day = mysqli_real_escape_string($con, $room['price_per_day']);
    $facilities = mysqli_real_escape_string($con, $room['facilities']);
    $description = mysqli_real_escape_string($con, $room['description']);
    $status = mysqli_real_escape_string($con, $room['status']);

    $sql = "INSERT INTO rooms (room_number, room_type, floor, capacity, price_per_day, facilities, description, status) 
            VALUES ('{$room_number}', '{$room_type}', '{$floor}', '{$capacity}', '{$price_per_day}', '{$facilities}', '{$description}', '{$status}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function updateRoom($room)
{
    $con = getConnection();

    $id = mysqli_real_escape_string($con, $room['id']);
    $room_number = mysqli_real_escape_string($con, $room['room_number']);
    $room_type = mysqli_real_escape_string($con, $room['room_type']);
    $floor = mysqli_real_escape_string($con, $room['floor']);
    $capacity = mysqli_real_escape_string($con, $room['capacity']);
    $price_per_day = mysqli_real_escape_string($con, $room['price_per_day']);
    $facilities = mysqli_real_escape_string($con, $room['facilities']);
    $description = mysqli_real_escape_string($con, $room['description']);
    $status = mysqli_real_escape_string($con, $room['status']);

    $sql = "UPDATE rooms SET room_number='{$room_number}', room_type='{$room_type}', floor='{$floor}', 
            capacity='{$capacity}', price_per_day='{$price_per_day}', facilities='{$facilities}', 
            description='{$description}', status='{$status}' WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteRoom($id)
{
    $con = getConnection();
    $sql = "DELETE FROM rooms WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
function assignPatientToRoom($room_id, $patient_id)
{
    $con = getConnection();
    $room_id = mysqli_real_escape_string($con, $room_id);
    $patient_id = mysqli_real_escape_string($con, $patient_id);

    $sql = "UPDATE rooms SET status = 'Occupied', assigned_patient_id = '{$patient_id}' WHERE id = '{$room_id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>