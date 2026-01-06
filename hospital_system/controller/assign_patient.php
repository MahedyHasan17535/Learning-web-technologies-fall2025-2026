<?php
session_start();
require_once('../model/roomModel.php');

if (isset($_POST['submit'])) {
    $patient_id = $_POST['patient_id'];
    $room_id = $_POST['room_id'];

    if (empty($patient_id) || empty($room_id)) {
        header('location: ../view/patient_room_assign.php?error=empty_fields');
        exit();
    } else {
       
        $result = assignPatientToRoom($patient_id, $room_id);

        if ($result) {
            
            updateRoomStatus($room_id, 'Occupied');
            header('location: ../view/room_list.php?success=assigned');
        } else {
            echo "Failed to assign patient.";
        }
    }
} else {
    header('location: ../view/room_list.php');
}
?>