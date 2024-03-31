<?php
session_start();

if (!isset($_SESSION["Admin_Id"])) {
     header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

     <title>Health - Medical Website Template</title>
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
     <link rel="stylesheet" href="css/home.css">
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container Fix">
               <div class="row">

                    <div class="col-md-4 col-sm-5 ">
                         <p>Welcome to a IHavePET</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-arrows"></i> 083-234-567</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 9:00 AM - 18:00 PM
                              (Mon-Fri)</span>
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
                         <li class="appointment-btn" onclick="menuToggle();"><a><i class="fa fa-user-circle-o" aria-hidden="true"></i>My Profile</a></li>
                    </ul>
               </div>
          </div>
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


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-fourth">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Welcome to</h3>
                                        <h1>IHavePET</h1>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>





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