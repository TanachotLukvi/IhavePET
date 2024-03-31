<?php
session_start();
require("db_connection.php");
$Pet_id = $_POST["billpetid"];
$IdSer_1 = $_POST["ser1"];
$IdSer_2 = $_POST["ser2"];
$IdSer_3 = $_POST["ser3"];
$IdSer_4 = $_POST["ser4"];
$IdSer_5 = $_POST["ser5"];
$Total_price_ser = 0;

if (empty($Pet_id)) {
    $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
    header("location: bill.php");
} else {
    if (!empty($IdSer_1)) {
        $sql_search = "SELECT Service_price from service where Service_Id = $IdSer_1";
        $result_search = mysqli_query($conn, $sql_search);
        $row = mysqli_fetch_assoc($result_search);
        $Total_price_ser += $row["Service_price"];
    }
    if (!empty($IdSer_2)) {
        $sql_search = "SELECT Service_price from service where Service_Id = $IdSer_2";
        $result_search = mysqli_query($conn, $sql_search);
        $row = mysqli_fetch_assoc($result_search);
        $Total_price_ser += $row["Service_price"];
    }
    if (!empty($IdSer_3)) {
        $sql_search = "SELECT Service_price from service where Service_Id = $IdSer_3";
        $result_search = mysqli_query($conn, $sql_search);
        $row = mysqli_fetch_assoc($result_search);
        $Total_price_ser += $row["Service_price"];
    }
    if (!empty($IdSer_4)) {
        $sql_search = "SELECT Service_price from service where Service_Id = $IdSer_4";
        $result_search = mysqli_query($conn, $sql_search);
        $row = mysqli_fetch_assoc($result_search);
        $Total_price_ser += $row["Service_price"];
    }
    if (!empty($IdSer_5)) {
        $sql_search = "SELECT Service_price from service where Service_Id = $IdSer_5";
        $result_search = mysqli_query($conn, $sql_search);
        $row = mysqli_fetch_assoc($result_search);
        $Total_price_ser += $row["Service_price"];
    }
    $sql_checkpet = "SELECT Pet_Id from pet where Pet_Id = $Pet_id";
    $result_pet_id = mysqli_query($conn, $sql_checkpet);
    if (mysqli_num_rows($result_pet_id) == 0) {
        $_SESSION['error'] = 'ไม่มีหมายเลขสัตว์เลี้ยงที่ระบุ';
        header("location: bill.php");
    } else {
        $sql_insert = "INSERT into bill(S_Id1, S_Id2, S_Id3, S_Id4, S_Id5, Pet_Id, Total_Cost) 
values('$IdSer_1', '$IdSer_2', '$IdSer_3', '$IdSer_4', '$IdSer_5', '$Pet_id', '$Total_price_ser')";
        $result_insert = mysqli_query($conn, $sql_insert) or die("ไม่มี Pet id");
        $_SESSION['success'] = 'บันทึกข้อมูลเรียบร้อย';
        header("location: bill.php");
    }
}
