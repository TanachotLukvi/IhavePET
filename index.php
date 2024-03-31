<?php
require_once 'db_connection.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>IhavePET</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<!--===============================================================================================-->

</head>

<body>
	<div class="limiter login-bg" style="height:100%; padding: 1px;"></div>
	<div class="limiter" style="height:100%; padding: 1px">
		<div class="login-frame" style="width: 550px; background-color: white; margin:50px auto 0 auto; padding: 10px">
			<div class="p-t-15" style="text-align: center;">
				<img src="images/IhavePET_logo.jpg" style="width: 500px; padding: 20px;">
			</div>
			<div class="container-login100" style="min-height : 650px">
				<div class="wrap-login-JAI">
					<form class="login100-form validate-form p-l-35 p-r-35 p-t-160" style="height: 500px;"
						action="checklogin.php" method="POST">
						<div class="login-title">
							<span class="login100-form-title" style="font-family: 'Kanit'">
								SIGN IN
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
							<input class="input100" id="name" type="text" name="username" placeholder="ชื่อผู้ใช้งาน">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-50" data-validate="Please enter password">
							<input class="input100" id="pass" type="password" name="password" placeholder="รหัสผ่าน">
							<span class="focus-input100"></span>
						</div>
						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn">
								เข้าสู่ระบบ
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>

</body>

</html>

<?php
mysqli_close($conn)
	?>