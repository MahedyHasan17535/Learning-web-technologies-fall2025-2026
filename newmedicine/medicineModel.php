<?php
require_once('db.php');

function getMedicineById($id)
{
    $con = getConnection();
    $sql = "SELECT * FROM medicines WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function getAllMedicines()
{
    $con = getConnection();
    $sql = "SELECT * FROM medicines ORDER BY medicine_name ASC";
    $result = mysqli_query($con, $sql);

    $medicines = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $medicines[] = $row;
        }
    }

    return $medicines;
}

function getLowStockMedicines()
{
    $con = getConnection();
    $sql = "SELECT * FROM medicines WHERE stock_quantity <= reorder_level ORDER BY stock_quantity ASC";
    $result = mysqli_query($con, $sql);

    $medicines = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $medicines[] = $row;
        }
    }

    return $medicines;
}

function addMedicine($medicine)
{
    $con = getConnection();

    $medicine_name = mysqli_real_escape_string($con, $medicine['medicine_name']);
    $generic_name = mysqli_real_escape_string($con, $medicine['generic_name']);
    $category = mysqli_real_escape_string($con, $medicine['category']);
    $description = mysqli_real_escape_string($con, $medicine['description']);
    $manufacturer = mysqli_real_escape_string($con, $medicine['manufacturer']);
    $unit_price = mysqli_real_escape_string($con, $medicine['unit_price']);
    $stock_quantity = mysqli_real_escape_string($con, $medicine['stock_quantity']);
    $reorder_level = mysqli_real_escape_string($con, $medicine['reorder_level']);
    $expiry_date = mysqli_real_escape_string($con, $medicine['expiry_date']);

    $sql = "INSERT INTO medicines (medicine_name, generic_name, category, description, manufacturer, unit_price, stock_quantity, reorder_level, expiry_date) 
            VALUES ('{$medicine_name}', '{$generic_name}', '{$category}', '{$description}', '{$manufacturer}', '{$unit_price}', '{$stock_quantity}', '{$reorder_level}', '{$expiry_date}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function updateMedicine($medicine)
{
    $con = getConnection();

    $id = mysqli_real_escape_string($con, $medicine['id']);
    $medicine_name = mysqli_real_escape_string($con, $medicine['medicine_name']);
    $generic_name = mysqli_real_escape_string($con, $medicine['generic_name']);
    $category = mysqli_real_escape_string($con, $medicine['category']);
    $description = mysqli_real_escape_string($con, $medicine['description']);
    $manufacturer = mysqli_real_escape_string($con, $medicine['manufacturer']);
    $unit_price = mysqli_real_escape_string($con, $medicine['unit_price']);
    $stock_quantity = mysqli_real_escape_string($con, $medicine['stock_quantity']);
    $reorder_level = mysqli_real_escape_string($con, $medicine['reorder_level']);
    $expiry_date = mysqli_real_escape_string($con, $medicine['expiry_date']);

    $sql = "UPDATE medicines SET medicine_name='{$medicine_name}', generic_name='{$generic_name}', category='{$category}', 
            description='{$description}', manufacturer='{$manufacturer}', unit_price='{$unit_price}', 
            stock_quantity='{$stock_quantity}', reorder_level='{$reorder_level}', expiry_date='{$expiry_date}' WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteMedicine($id)
{
    $con = getConnection();
    $sql = "DELETE FROM medicines WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>