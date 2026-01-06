<?php
function getConnection() {
    $host = "localhost";
    $dbuser = "root";
    $dbpass = ""; // Default for XAMPP
    $dbname = "hospital_db";

    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
?>