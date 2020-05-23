<?php
		$Employee_Name = "";
		$Qualification = "";
		$Contact = "";
		$servername = "localhost";
		$username = "root";
		$password = "MeetModi08)(";
		$dbname = "hospitalmanagement";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "CALL Display_Employee_Details(4401)";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{    
			while ($row = $result->fetch_assoc()) 
			{ 
			    $rows[] = $row; 
			}
			foreach($rows as $row) 
			{
				$Employee_Name =  $row["Employee_Name"];
				$Qualification =  $row["Qualification"];
				$Contact = $row["Contact"];
    		}
		} else 
		{
		    echo "0 results";
		}
		$conn->close();
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
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
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">


				<div class="topbar-child2">
					<span class="topbar-email">
						admin@hms.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo-retina.png" alt="IMG-LOGO">
				</a>

				<span>Admin's Portal</span>
				<!-- Header Icon -->
								<div class="header-icons">
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
												
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/icons/icon-header-01.png" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $Employee_Name?>
											<br>
											<?php echo $Qualification?>
											<br>
											<?php echo $Contact?>
											<br>
										</a>

									</div>
								</li>
							</ul>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										about
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Sign Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		<div class="row">
			<span style="display:inline-block; width: 200px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="Patients/Patients.php">
				<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Patients.
						</button>
					</div>
				</form>
			</div>
			<div class="block4 wrap-pic-w">
				<form action="Appointments/Appointments.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Appointments.
						</button>
					</div>
				</form>
			</div>
			<div class="block4 wrap-pic-w">
				<form action="Reports/Reports.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Reports.
						</button>
					</div>
				</form>
			</div>
		</div>
		
		<br>
		<div class="row">
			<span style="display:inline-block; width: 200px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="Bill/Bills.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Bills.
						</button>
					</div>
				</form>
			</div>
			<div class="block4 wrap-pic-w">
				<form action="Ward/Ward.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Ward.
						</button>
					</div>
				</form>
			</div>
			<div class="block4 wrap-pic-w">
					<form action="Visitors/Visitors.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Visitors.
						</button>
					</div>
				</form>
			</div>
			
		</div>
		<br>

		<div class="row">
	
			<span style="display:inline-block; width: 320px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="Prescription/Prescription.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Prescription.
						</button>
					</div>
				</form>
			
			</div>
			<form action="Employee/Employees.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>
							Employee.
						</button>
					</div>
				</form>
		</div>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
