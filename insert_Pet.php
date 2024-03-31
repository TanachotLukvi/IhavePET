<?php
session_start();
require("db_connection.php");
$Pet_Name = $_POST["Petname"];
$Pet_Sex = $_POST["Sex"];
$Pet_Age = $_POST["Age"];
$Pet_Type = $_POST["Type"];
$Pet_Chro = $_POST["PetDis"];
$Pet_W = $_POST["Weight"];
$Owner_id = $_POST["OwnerID"];

if (empty($Pet_Name) || empty($Pet_Sex) || empty($Pet_Age) || empty($Pet_Type) || empty($Pet_Chro) || empty($Pet_W) || empty($Owner_id)) {
    $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
    header("location: Pet.php");
} else {
    $sql_checkId = "SELECT Owner_Id from Owner where Owner_Id = '" . $Owner_id . "' ";
    $result_owner_id = mysqli_query($conn, $sql_checkId);
    if (mysqli_num_rows($result_owner_id) == 0) {
        $_SESSION['error'] = 'ไม่มีเลขบัตรประชาชนที่ระบุ';
        header("location: Pet.php");
    } else {
        $sql_insert = "INSERT into PET(Pet_Name, Pet_Sex, Pet_Age, Pet_Type, Pet_Chro, Pet_Weight, Owner_Id) 
    VALUES('$Pet_Name', '$Pet_Sex', '$Pet_Age', '$Pet_Type', '$Pet_Chro', '$Pet_W', '$Owner_id')";
        $result_insert = mysqli_query($conn, $sql_insert) or die("ไม่มีเลขบัตรประชาชนที่ระบุ");
        $_SESSION['success'] = 'บันทึกข้อมูลเรียบร้อย';
        header("location: Pet.php");
    }
}
