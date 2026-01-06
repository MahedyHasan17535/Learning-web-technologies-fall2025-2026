<?php
session_start();
require_once('../model/medicineModel.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $medicine_name = $_POST['medicine_name'];
    $generic_name = $_POST['generic_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $manufacturer = $_POST['manufacturer'];
    $unit_price = $_POST['unit_price'];
    $stock_quantity = $_POST['stock_quantity'];
    $reorder_level = $_POST['reorder_level'];
    $expiry_date = $_POST['expiry_date'];

    if ($medicine_name == "" || $unit_price == "") {
        echo "All required fields must be filled";
    } else {
        $medicine = [
            'id' => $id,
            'medicine_name' => $medicine_name,
            'generic_name' => $generic_name,
            'category' => $category,
            'description' => $description,
            'manufacturer' => $manufacturer,
            'unit_price' => $unit_price,
            'stock_quantity' => $stock_quantity ? $stock_quantity : 0,
            'reorder_level' => $reorder_level ? $reorder_level : 10,
            'expiry_date' => $expiry_date
        ];

        $result = updateMedicine($medicine);

        if ($result) {
            header('location: ../view/medicine_list.php');
        } else {
            echo "Failed to update medicine";
        }
    }
} else {
    header('location: ../view/medicine_list.php');
}
?>