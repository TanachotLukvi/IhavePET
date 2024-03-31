<?php
require("db_connection.php");
session_start();

if (!isset($_SESSION["Admin_Id"])) {
    header("location: index.php");
}

$pet_id = $_SESSION['pet_id'];

$sql_medical = "SELECT M.M_Id,M.Doctor_Id, P.Pet_Id, P.Owner_Id, P.Pet_Name, P.Pet_Sex, P.Pet_Type, M.M_Disease, 
        DATE_FORMAT(M.Med_Date, '%e/%b/%Y') as Med_Date , M.Med_Total from Pet P join Medical M on P.Pet_Id = M.Pet_Id 
        where P.Pet_Id = $pet_id";
$result_pet = mysqli_query($conn, $sql_medical);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>IhavePET</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" href="css/view_status.css">


</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <p style="background-image: url('../images/slider2.jpg');"></p>

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-5">
                    <p>Welcome to a IHavePET</p>
                </div>

                <div class="col-md-8 col-sm-7 text-align-right">
                    <span class="phone-icon"><i class="fa fa-arrows"></i> 083-234-567</span>
                    <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 9:00 AM - 18:00 PM (Mon-Fri)</span>
                    <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">IHavePET@gmail.com</a></span>
                </div>

            </div>
        </div>
    </header>


    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="home.php" class="navbar-brand"><img src="images/IhavePET_logo.jpg" alt="" class="logo"></a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Customer.php" class="smoothScroll">Customer Reg.</a></li>
                    <li><a href="Pet.php" class="smoothScroll">Pet Reg.</a></li>
                    <li><a href="detail.php" class="smoothScroll">Information</a></li>
                    <li><a href="bill.php" class="smoothScroll">Payment Info</a></li>
                    <li><a href="status.php" class="smoothScroll">Status</a></li>
                    <li class="appointment-btn " onclick="menuToggle();"><a><i class="fa fa-user-circle-o" aria-hidden="true"></i> My Profile</a> </li>
                </ul>
            </div>

        </div>
    </section>


    <!-- Drop down profile -->
    </section>
    <div class="action">
        <div class="profile">
            <div class="menu">
                <div>
                    <p class="namepro"><?php echo $_SESSION['Name_admin'] . " " . $_SESSION['Surname_admin'] ?></p>
                </div>
                <div class="logpro">
                    <ul>
                        <li><a href="log_out.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function menuToggle() {
            const togglemenu = document.querySelector('.menu')
            togglemenu.classList.toggle('active')
        }
    </script>



    <!-- Bill Detail -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>รหัสสัตว์เลี้ยง</th>
                <th>เลขบัตรประชาชนเจ้าของ</th>
                <th>สัตวแพทย์ผู้ดูแล</th>
                <th>ชื่อสัตว์เลี้ยง</th>
                <th>เพศ</th>
                <th>ประเภท</th>
                <th>วันที่รักษา</th>
                <th>อาการ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_pet)) { ?>
                <tr>
                    <td><?php echo $row['Pet_Id']; ?></td>
                    <td><?php echo $row['Owner_Id']; ?></td>
                    <td><?php $sql_doctor = "SELECT * from doctor WHERE Doctor_Id = '" . $row['Doctor_Id'] . "' ";
                        $result_doctor = mysqli_query($conn, $sql_doctor);
                        $row_doctor = mysqli_fetch_assoc($result_doctor);
                        echo $row_doctor['Name'] . " ". $row_doctor['Surname'];?></td>
                    <td><?php echo $row['Pet_Name']; ?></td>
                    <td><?php echo $row['Pet_Sex']; ?></td>
                    <td><?php echo $row['Pet_Type']; ?></td>
                    <td><?php echo $row['Med_Date']; ?></td>
                    <td><?php echo $row['M_Disease']; ?></td>
                    <td><a href="delete_medical.php?medical_id=<?php echo $row['M_Id']; ?>" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')">ลบข้อมูล</a></td>
                    <td><a href="form_edit.php?medical_id=<?php echo $row['M_Id']; ?>" class="btn btn-primary">แก้ไขข้อมูล</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>





    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>