<?php
session_start();
require("db_connection.php");
$Owner_id = $_POST["detail-owner-id"];
$Pet_id = $_POST["detail-pet-id"];
$Doctor_id = $_POST['doctor-id'];
$M_Dis = $_POST["detail-pet-dis"];
$IdDrug_1 = $_POST["drug1"];
$IdDrug_2 = $_POST["drug2"];
$IdDrug_3 = $_POST["drug3"];
$IdDrug_4 = $_POST["drug4"];
$IdDrug_5 = $_POST["drug5"];
$Total_price_med = 0;

if (!empty($Owner_id) && !empty($Pet_id) && !empty($M_Dis) && !empty($Doctor_id)) {
    if (!empty($IdDrug_1)) {
        if (!empty($_POST["drug1num"])) {
            $sql_search = "SELECT Med_price FROM medicine where Med_Id = $IdDrug_1";
            $result = mysqli_query($conn, $sql_search);
            $row = mysqli_fetch_assoc($result);
            print_r($row);
            $Total_price_med += $row["Med_price"] * $_POST["drug1num"];
            echo "$Total_price_med" . "<br>";

        } else {
            $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
            header('location: detail.php');
        }
    }
    if (!empty($IdDrug_2)) {
        if (!empty($_POST["drug2num"])) {
            $sql_search = "SELECT Med_price FROM medicine where Med_Id = $IdDrug_2";
            $result = mysqli_query($conn, $sql_search);
            $row = mysqli_fetch_assoc($result);
            $Total_price_med += $row["Med_price"] * $_POST["drug2num"];

        } else {
            $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
            header('location: detail.php');
        }
    }
    if (!empty($IdDrug_3)) {
        if (!empty($_POST["drug3num"])) {
            $sql_search = "SELECT Med_price FROM medicine where Med_Id = $IdDrug_3";
            $result = mysqli_query($conn, $sql_search);
            $row = mysqli_fetch_assoc($result);
            $Total_price_med += $row["Med_price"] * $_POST["drug3num"];

        } else {
            $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
            header('location: detail.php');
        }
    }
    if (!empty($IdDrug_4)) {
        if (!empty($_POST["drug4num"])) {
            $sql_search = "SELECT Med_price FROM medicine where Med_Id = $IdDrug_4";
            $result = mysqli_query($conn, $sql_search);
            $row = mysqli_fetch_assoc($result);
            $Total_price_med += $row["Med_price"] * $_POST["drug4num"];

        } else {
            $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
            header('location: detail.php');
        }
    }
    if (!empty($IdDrug_5)) {
        if (!empty($_POST["drug5num"])) {
            $sql_search = "SELECT Med_price FROM medicine where Med_Id = $IdDrug_5";
            $result = mysqli_query($conn, $sql_search);
            $row = mysqli_fetch_assoc($result);
            $Total_price_med += $row["Med_price"] * $_POST["drug5num"];

        } else {
            $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
            header('location: detail.php');
        }
    }

    /* insert to Medical */
    $sql_insert = "INSERT into MEDICAL(M_Disease, Med_Total, Med_Date, Owner_Id, Pet_Id, Doctor_Id) 
    VALUES('$M_Dis','$Total_price_med', (SELECT current_date()),(SELECT Owner_Id from Owner where Owner_Id = $Owner_id LIMIT 1),
    (SELECT Pet_Id from Pet where Pet_Id = $Pet_id LIMIT 1), (SELECT Doctor_Id from Doctor where Doctor_Id = $Doctor_id))";
    $result_insert = mysqli_query($conn, $sql_insert);

    if ($result_insert) {
        $_SESSION['success'] = 'บันทึกข้อมูลเรียบร้อย';
        header("location: detail.php");
    } else {
        echo mysqli_error($conn);
    }
} else {
    $_SESSION['error'] = 'โปรดใส่ข้อมูลให้ครบถ้วน';
    header('location: detail.php');
}

?>