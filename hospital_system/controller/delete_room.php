<?php
session_start();
require_once('../model/roomModel.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $result = deleteRoom($id);

    if ($result) {
       
        header('location: ../view/room_list.php');
    } else {
       
        echo "Failed to delete room";
    }
} else {
    
    header('location: ../view/room_list.php');
}
?>