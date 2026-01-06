<?php
session_start();
require_once('../model/roomModel.php');

if (isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $floor = $_POST['floor'];
    $capacity = $_POST['capacity'];
    $price_per_day = $_POST['price_per_day'];
    $facilities = $_POST['facilities'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    if ($room_number == "" || $price_per_day == "" || $room_type == "" || $floor == "") {
        echo "All required fields must be filled";
    } else {
        
        $room = [
            'id' => $id,
            'room_number' => $room_number,
            'room_type' => $room_type,
            'floor' => $floor,
            'capacity' => $capacity ? $capacity : 1,
            'price_per_day' => $price_per_day,
            'facilities' => $facilities,
            'description' => $description,
            'status' => $status
        ];

        $result = updateRoom($room);

        if ($result) {
            header('location: ../view/room_list.php');
        } else {
            echo "Failed to update room";
        }
    }
} else {
    header('location: ../view/room_list.php');
}
?>