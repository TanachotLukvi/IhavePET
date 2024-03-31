<?php
session_start();
require("db_connection.php");
$medical_id = $_GET['medical_id'];
$sql_delete = "DELETE from medical where M_Id = $medical_id";
$result_delete = mysqli_query($conn, $sql_delete);
if($result_delete){
    header("location: view_status.php");
}
else{
    echo "เกิดข้อผืดพลาดขึ้น";
}
?>