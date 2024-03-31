<?php
session_start();
require("db_connection.php");
$pet_id = $_POST['input-pet_id'];

if (empty($pet_id)) {
    $_SESSION['error'] = 'กรุณากรอกหมายเลขสัตว์เลี้ยง';
    header("location: status.php");
} else {
    $sql_check_id = "SELECT Pet_Id from pet where Pet_Id = $pet_id";
    $result_check = mysqli_query($conn, $sql_check_id);
    if (mysqli_num_rows($result_check) == 0) {
        $_SESSION['error'] = 'ไม่พบหมายเลขสัตว์เลี้ยงที่ระบุ';
        header("location: status.php");
    } else {
        $_SESSION['pet_id'] = $pet_id;
        header("location: view_status.php");
        /* $sql = "SELECT distinct(P.Pet_Id), P.Owner_Id, P.Pet_Name, P.Pet_Sex, P.Pet_Type, M.M_Disease, 
        DATE_FORMAT(M.Med_Date, '%e/%b/%Y') as Med_Date from Pet P join Medical M on P.Pet_Id = M.Pet_Id 
        where P.Pet_Id = $pet_id";
        $result_pet = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result_pet)){
             print_r($row). "<br>";
        } */
    }
}
