<?php
session_start();
if (isset($_POST['username'])) {
    include("db_connection.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin 
        WHERE  Username='" . $username . "' 
        AND  Password='" . $password . "' ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);#Data admin


    if (mysqli_num_rows($result) == 1) {
        #$row = mysqli_fetch_array($result);
        $_SESSION["Admin_Id"] = $row["Admin_Id"];
        $_SESSION["Name_admin"] = $row["Name"];
        $_SESSION["Surname_admin"] = $row["Surname"];
        Header("Location: home.php");
    } else {

        echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
            echo "window.history.back()";
        echo "</script>";

    }
} else {

    Header("Location: index.php"); //user & password incorrect back to login again

}
?>