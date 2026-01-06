<?php
session_start();
require_once('../model/roomModel.php');

if (isset($_POST['submit'])) {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $floor = $_POST['floor'];
    $capacity = $_POST['capacity'];
    $price_per_day = $_POST['price_per_day'];
    $facilities = $_POST['facilities'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    if (empty($room_number) || empty($room_type) || empty($floor) || 
        empty($capacity) || empty($price_per_day) || empty($status)) {
        
        // Redirect back so no "new page" stays open on error
        header('location: ../view/room_add.php?error=empty_fields');
        exit(); 
    } 
    // Validation: Ensure price and capacity are valid numbers
    elseif ($price_per_day <= 0 || $capacity <= 0) {
        header('location: ../view/room_add.php?error=invalid_values');
        exit();
    }
    else {
        $room = [
            'room_number'   => $room_number,
            'room_type'     => $room_type,
            'floor'         => $floor,
            'capacity'      => $capacity,
            'price_per_day' => $price_per_day,
            'facilities'    => $facilities ? $facilities : 'N/A',
            'description'   => $description,
            'status'        => $status
        ];

        $result = addRoom($room);

        if ($result) {
  
            header('location: ../view/room_list.php');
        } else {
     
            echo "Failed to add room to database.";
        }
    }
} else {
    header('location: ../view/room_list.php');
}
?>