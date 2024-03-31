<?php
session_start();
require("db_connection.php");
$med_Id = $_SESSION['med_id'];
$pet_Id = $_SESSION['pet_id'];
$Pet_Name = $_POST['Petname'];
$Pet_Sex = $_POST['Sex'];
$Pet_Type = $_POST['Type'];
$Med_detail = $_POST['Detail'];

if (empty($Pet_Name) || empty($Pet_Sex) || empty($Pet_Type) || empty($Med_detail)) {
    $_SESSION['error'] = "โปรดใส่ข้อมูลให้ครบถ้วน";
    echo "<script>";
    echo "window.history.back()";
    echo "</script>";
} else {
    $update_med = "UPDATE medical SET M_Disease = '$Med_detail' WHERE M_Id = $med_Id";
    $result_med = mysqli_query($conn, $update_med);

    $update_pet = "UPDATE pet SET Pet_Name = '$Pet_Name', Pet_Sex = '$Pet_Sex', Pet_Type = '$Pet_Type' 
    where Pet_Id = $pet_Id";
    $result_pet = mysqli_query($conn, $update_pet);
    if($result_med && $result_pet){
        header("location: view_status.php");
    }
    else{
        echo mysqli_error($conn);
    }
}
