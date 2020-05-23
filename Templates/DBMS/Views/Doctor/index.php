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
				$Employee_ID = $row["Employee_ID"];
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
<style type="text/css">
	.meet-head{ 
  font-family: Montserrat-Bold;
  font-size: 13px;
  color: #555555;
  line-height: 1.5;
  text-transform: uppercase;
  padding-top: 16px;
  padding-bottom: 16px;
}
</style>
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-child2">
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo-retina.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<span>Doctor's Portal</span>
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
			<span style="display:inline-block; width: 150px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="index.php">
				<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='SeeAllPatients' value='SeeAllPatients'>
							See Patients.
						</button>
					</div>
				</form>
			</div>
			<span style="display:inline-block; width: 70px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="index.php">
				<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='SeeAppointments' value='SeeAppointments'>
							See Appointments.
						</button>
					</div>
				</form>
			</div>
			<span style="display:inline-block; width: 50px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="index.php">
				<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='ReportSearched' value='ReportSearched'>
							See Reports.
						</button>
					</div>
				</form>
			</div>
		</div>

		<?php 
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) 
			{
			    die("Connection failed: " . $conn->connect_error);
			} 
			if(isset($_GET['SeeAllPatients'])){
					$sql = "CALL Display_Patient('$Employee_ID');";
					$result = mysqli_query($conn,$sql);
					if (!$result = mysqli_query($conn,$sql))
  					{
  						echo("<br><br>Error description: " . mysqli_error($conn));
  					}
					else{
						echo "<br><center><p class='meet-head'>Patients Under You.</p><br>";
						if ($result->num_rows > 0) 
						{    
							echo "<table class='table-shopping-cart .table-head th'>
								<tr><th>Patient Type</th>
								<th>Patient Name</th>
								<th>Ward No</th>
								<th>Gender</th>
								<th>Admit from date</th>
								<th>Admit to date</th>
								<th>Patient ID</th>
								<th>Age</th>
								</tr>";
							while ($row = $result->fetch_assoc()) 
							{ 
								echo "<tr><th>".$row["Patient_type"]."</th>
									  <th>".$row["Patient_Name"]."</th>
									  <th>".$row["Ward_No"]."</th>
								      <th>".$row["Gender"]."</th>
									  <th>".$row["Admit_From_Date"]."</th>
									  <th>".$row["Admit_To_Date"]."</th>
									  <th>".$row["Patient_ID"]."</th>
									  <th>".$row["Age"]."</th></tr>";
							}
									  echo "</table>";
							
						}else 
						{
						echo "<br><center><p class='meet-head'>0 results</p><br>";
						}
					}
			}
			if(isset($_GET['SeeAppointments'])){
					$sql = "select appointment_no,appointment_date from appointment where appointment_no in (select appointment_no from appointment_with where Doctor_ID = 8001)";
					$result = mysqli_query($conn,$sql);
					echo "<br><center><p class='meet-head'>Today's Appointment.</p><br>";
					if ($result->num_rows > 0) 
					{    
						echo "<table class='table-shopping-cart .table-head th'>
							<tr><th>Appointment Number</th>
							<th>Appointment date</th>
							<th>Patient ID</th>
							</tr>";
							$i = 4;
						while ($row = $result->fetch_assoc()) 
						{ 
							echo "<tr><th>".$row["appointment_no"]."</th>
								  <th>".$row["appointment_date"]."</th>
								  <th>300".$i."</th>
								  </tr>";
								  $i++;
						}
								  echo "</table>";
						
					}else 
					{
					echo "<br><center><p class='meet-head'>0 results</p><br>";
					}
				
			}
			if(isset($_GET['ReportSearched'])){

					$sql = "CALL Display_Reports_Doctor(8001)";
					$result = mysqli_query($conn,$sql);
					if (!$result = mysqli_query($conn,$sql))
  					{
  						echo("<br><br>Error description: " . mysqli_error($conn));
  					}
					else{
						echo "<br><center><p class='meet-head'>Searched Report</p><br>";
						if ($result->num_rows > 0) 
						{    
							echo "<align:'center'>";
							echo "<table class='table-shopping-cart .table-head th' align='right'>
								<tr><th>Remarks</th>
								<th>Report_Date</th>
								<th>Doctor_ID</th>
								<th>Patient_ID</th>
								<th>Operation_Advisory_ID</th>
								</tr>";
							while ($row = $result->fetch_assoc()) 
							{ 
								echo "<tr><th>".$row["Remarks"]."</th>
									  <th>".$row["Report_Date"]."</th>
									  <th>".$row["Doctor_ID"]."</th>
								      <th>".$row["Patient_ID"]."</th>
									  <th>".$row["Operation_Advisory_ID"]."</th>
									  </tr>";
							}
									  echo "</table></align>";
						} else 
						{
						    echo "0 results";
						}
					}
			}
			
			$conn->close();
		?>		




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
