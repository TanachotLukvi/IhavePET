<?php
session_start();
require("db_connection.php");
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$tel = $_POST["tel"];
$age = $_POST["age"];
$Cus_id = $_POST["CusID"];

$sql_owner_id = "SELECT * from Owner where Owner_Id = '" . $Cus_id . "'";

$result_owner_id = mysqli_query($conn, $sql_owner_id);

if (mysqli_num_rows($result_owner_id) == 1) {
    $_SESSION['error'] = "เลขบัตรประชาชนนี้ได้ลงทะเบียนไว้แล้ว";
    header("location: Customer.php");
} elseif (empty($fname) || empty($lname) || empty($tel) || empty($age) || empty($Cus_id)) {
    $_SESSION['error'] = "โปรดใส่ข้อมูลให้ครบถ้วน";
    header("location: Customer.php");
}else if(str_word_count($Cus_id) != 13){
    $_SESSION['error'] = "โปรดระบุเลขบัตรประชาชนให้ครบ 13 หลัก";
    header("location: Customer.php");
}else {
    $sql_insert = "INSERT into Owner VALUES('$Cus_id', '$fname','$lname','$tel','$age')";
    $result_insert = mysqli_query($conn, $sql_insert);
    $_SESSION['success'] = 'บันทึกข้อมูลเรียบร้อย';
    header("location: Customer.php");
}
?>