<?php
require_once('../model/roomModel.php');

if(isset($_GET['id'])){
    $assignment_id = $_GET['id'];

    // Call the function from the Model
    $status = dischargePatient($assignment_id);

    if($status){
        header('location: ../view/room_list.php?msg=success');
    } else {
        echo "Error during discharge.";
    }
} else {
    header('location: ../view/room_list.php');
}
?>