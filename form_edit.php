<?php
session_start();
require("db_connection.php");
$med_id = $_GET['medical_id'];
$_SESSION['med_id'] = $_GET['medical_id'];

$sql_data = "SELECT * from medical where M_Id = $med_id";
$result_data = mysqli_query($conn, $sql_data);
$row_data = mysqli_fetch_assoc($result_data);
/* print_r($row_data); */

//เรียกข้อมูล Pet
$pet_id = $row_data['Pet_Id'];
$_SESSION['pet_id'] = $row_data['Pet_Id'];

$sql_pet = "SELECT * from pet where Pet_Id = $pet_id";
$result_pet = mysqli_query($conn, $sql_pet);
$row_pet = mysqli_fetch_assoc($result_pet);
/* print_r($row_pet); */
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
    <link rel="stylesheet" href="css/petedit.css">


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



    <!-- Pet Registation Detail -->
    <form action="update_medical.php" method="post">
        <div class="PetRegis">
            <div>
                <div class="PetTop">
                    <p>Edit Form</p>
                    <div class="box-alert">
                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert-success" role="alert">
                                <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert-danger" role="alert">
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="Petform">
                    <div class="Petline1">
                        <div class="Petname">
                            <div class="">
                                <p class="">Name</p>
                            </div>
                            <div class="">
                                <input type="text" name="Petname" placeholder="ชื่อสัตว์เลี้ยง" value="<?php echo $row_pet['Pet_Name'] ?>">
                            </div>
                        </div>
                        <div class="Petsex">
                            <div>
                                <p class="">Pet Sex</p>
                            </div>
                            <div class="">
                                <select name="Sex" id="">
                                    <option disabled>ระบุเพศ</option>
                                    <?php
                                    if ($row_pet['Pet_Sex'] == 'Male') {
                                        echo "<option value='Male' selected>เพศผู้</option>";
                                        echo "<option value='Female'>เพศเมีย</option>";
                                    } else if ($row_pet['Pet_Sex'] == 'Female') {
                                        echo "<option value='Male'>เพศผู้</option>";
                                        echo "<option value='Female' selected>เพศเมีย</option>";
                                    } else {
                                        echo "<option selected disabled>ระบุเพศ</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="Petline2">

                        <div class="TypePet">
                            <div class="">
                                <p class="">Type</p>
                            </div>
                            <div class="">
                                <input type="text" name="Type" placeholder="ประเภทสัตว์เลี้ยง" value="<?php echo $row_pet['Pet_Type'] ?>">
                            </div>
                        </div>

                        <div class="Infor">
                            <div class="">
                                <p class="">Detail</p>
                            </div>
                            <div class="">
                                <input type="text" name="Detail" placeholder="รายละเอียดการรักษา" value="<?php echo $row_data['M_Disease'] ?>">
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <div class="Button">
                <input class="MarginClear" type="reset" name="" value="Clear">
                <input class="MarginSubmit" type="submit" value="Edit">
            </div>

        </div>
    </form>





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