<?php
require_once 'db_connection.php';

session_start();
$username = "Jai";
$password = "1111";

$sql = "SELECT * FROM admin 
        WHERE  Username='" . $username . "' 
        AND  Password='" . $password . "' ";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$Name = $row["Name"];

echo "<script>";
echo "alert(\"" . $_SESSION["User"]["Name"] . "\")";
echo "</script>";
echo "<br> <br>";
print_r($_SESSION)
    ?>