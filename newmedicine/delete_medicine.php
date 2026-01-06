<?php
session_start();
require_once('../model/medicineModel.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = deleteMedicine($id);

    if ($result) {
        header('location: ../view/medicine_list.php');
    } else {
        echo "Failed to delete medicine";
    }
} else {
    header('location: ../view/medicine_list.php');
}
?>