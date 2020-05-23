<?php
		$Employee_Name = "";
		$Qualification = "";
		$Contact = "";
		$servername = "localhost";
		$username = "root";
		$password = "MeetModi08)(";
		$dbname = "hospitalmanagement";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$PATIENT = "";
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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
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
					<span class="topbar-email">
						admin@hms.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="../index.php" class="logo">
					<img src="../images/icons/logo-retina.png" alt="IMG-LOGO">
				</a>

				<!-- Header Icon -->
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
			<span style="display:inline-block; width: 220px;"></span>
			<div class="block4 wrap-pic-w">
				
				<form action="Visitors.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name="AddPatient" value="AddPatient">
							Add Visitor.
						</button>
					</div>
				</form>
			</div>
			<span style="display:inline-block; width: 300px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="Visitors.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name="SearchVisitor" value="SearchVisitor">
							Search Visitor.
						</button>
					</div>
				</form>
			</div>
			
		</div>
		<br>
		<br>
		<?php 


			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) 
			{
			    die("Connection failed: " . $conn->connect_error);
			} 
			if(isset($_GET['AddPatient'])){
				echo "<center>
				<div class='w-size8 p-t-30 p-l-15 p-r-15 respon3'>
				<h4 class='s-text12 p-b-30'>
					Add a new Visitor : 
				</h4>
			<form action='Visitors.php'>
					<div class='effect1 w-size9'>
						Visitor Name :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='Name'>		
					</div>
					<br>
					<div class='effect1 w-size9'>
						Visitor ID :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='ID'>		
					</div>
					<br>
					<div class='effect1 w-size9'>
						Patient ID :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='pid'>		
					</div>
					<br>
					
					<div class='effect1 w-size9'>
						Stay From Date :
						<input class='s-text7 bg6 w-full p-b-5' type='date' name='StayFromDate'>		
					</div>
					<br>
					<div class='effect1 w-size9'>
						Stay From Date :
						<input class='s-text7 bg6 w-full p-b-5' type='date' name='StayTODate'>		
					</div>
					<br>
					<div class='w-size2 p-t-20'>
						<!-- Button -->
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='VisitorAdded' value='VisitorAdded'>
							Add new Visitor
						</button>
					</div>

		</form>
		</div>
		</center>";
				
			}


			if(isset($_GET['SearchVisitor'])){
				echo "<center><div class='w-size8 p-t-30 p-l-15 p-r-15 respon3'>
				<h4 class='s-text12 p-b-30'>
					Search Visitor : 
				</h4>
				<form action='Visitors.php?VisitorSearched=1'>
					
					<div class='effect1 w-size9'>
						Patient Name :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='pname'>		
					</div>

					<div class='effect1 w-size9'>
						Visitor ID (Optional):
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='ID'>		
					</div>
					
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='VisitorSearched' value='VisitorSearched'>
							Search Visitor.
						</button>
					</div>
				</form>	
				</div>
				</center>";


			}
			if(isset($_GET['VisitorAdded'])){
				$Name = $_GET["Name"];
				$StayFromDate = $_GET['StayFromDate'];
				$StayTODate = $_GET['StayTODate'];
				$Visitor_ID = $_GET['ID'];
				$pid = $_GET['pid'];
				$sql = "INSERT INTO visitor(Stay_From_Date, Stay_To_Date, Visitor_Name, Visitor_ID) VALUES ('$StayFromDate','$StayTODate','$Name','$Visitor_ID')";
				echo $sql;
				if (!mysqli_query($conn,$sql))
  				{
  					echo("<br><br>Error description: " . mysqli_error($conn));
  				}
  				$sql = "INSERT INTO `to_meet`(`Visitor_ID`, `Patient_ID`) VALUES ('$Visitor_ID','$pid')";
				echo "<br><br>";
				echo $sql;
				if (!mysqli_query($conn,$sql))
  				{
  					echo("<br><br>Error description: " . mysqli_error($conn));
  				}
			}
			if(isset($_GET['VisitorSearched'])){
					$pname = $_GET["pname"];					
					$sql = "CALL searchVisitor_pname('$pname')";
					$Visitor_ID = $_GET['ID'];
					if($Visitor_ID > 0){
					$sql = "SELECT * FROM visitor WHERE Visitor_ID = '$Visitor_ID'";	
					}
					$result = mysqli_query($conn,$sql);
					echo "<br><center><p class='meet-head'>Searched Visitors</p><br>";
					if ($result->num_rows > 0) 
					{    
						echo "<table class='table-shopping-cart .table-head th'>
							<tr><th>Visitor Name</th>
							<th>Visitor ID</th>
							<th>Stay From Date</th>
							<th>Stay To Date</th>
							</tr>";
						while ($row = $result->fetch_assoc()) 
						{ 
							echo "<tr><th>".$row["Visitor_Name"]."</th>
								  <th>".$row["Visitor_ID"]."</th>
								  <th>".$row["Stay_From_Date"]."</th>
							      <th>".$row["Stay_To_Date"]."</th>
								  </tr>";
						}
								  echo "</table>";
					} else 
					{
					    echo "0 results";
					}
				
			}
			$conn->close();
		?>		
		<div class="t-center p-l-15 p-r-15">

			<div class="t-center s-text8 p-t-20">
				

				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="../js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/sweetalert/sweetalert.min.js"></script>
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
	<script src="../js/main.js"></script>

</body>
</html>
