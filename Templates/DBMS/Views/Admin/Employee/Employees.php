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
				<span>Patient's Page</span>
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
			<span style="display:inline-block; width: 280px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="Employees.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name="AddEmployee" value="AddEmployee">
							Add a new Employee.
						</button>
					</div>
				</form>
			</div>
			<span style="display:inline-block; width: 280px;"></span>
			<div class="block4 wrap-pic-w">
				<form action="Employees.php">
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name="SearchPatient" value="SearchPatient">
							Search Employee.
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
			if(isset($_GET['AddEmployee'])){
				echo "<center>
				<div class='w-size8 p-t-30 p-l-15 p-r-15 respon3'>
				<h4 class='s-text12 p-b-30'>
					Add a new Employee : 
				</h4>
			<form action='Employees.php'>
					<div class='effect1 w-size9'>
						Employee Name :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='Name'>		
					</div>
					<br>
					<div class='effect1 w-size9'>
						Employee ID :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='Name'>		
					</div>
					<br>
					<div class='effect1 w-size9'>
						Employee D.O.B :
						<input class='s-text7 bg6 w-full p-b-5' type='date' name='D.O.B'>		
					</div>
					<br>
					<div class='effect1 w-size9'>
						Employee D.O.J :
						<input class='s-text7 bg6 w-full p-b-5' type='date' name='D.O.J'>		
					</div>
					<br>
					
					<br>
					<div class='effect1 w-size9'>
						Salary :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='Salary'>		
					</div>
					<br>

					<div class='effect1 w-size9'>
						Qualification :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='Qualification'>		
					</div>
					<br>

					<div class='effect1 w-size9'>
						Employee Type :
						Gender :
						<select name='Gender'>
    						<option value=''>Doctor</option>
    						<option value=''>Admin</option>
    						<option value='Accountant'>Accountant</option>
    						<option value='Nurse'>Nurse</option>
    						<option value='Accountant'>Accountant</option>
   						  </select>		
					<br>
					<div class='w-size2 p-t-20'>
						<!-- Button -->
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='PatientAdded' value='PatientAdded'>
							Add new Employee
						</button>
					</div>

		</form>
		</div>
		</center>";
				
			}


			if(isset($_GET['SearchEmployee'])){
				echo "<center><div class='w-size8 p-t-30 p-l-15 p-r-15 respon3'>
				<h4 class='s-text12 p-b-30'>
					Search Patient : 
				</h4>
				<form action='Employees.php?EmployeesSearched=1'>
					<div class='effect1 w-size9'>
						Patient Name :
						<input class='s-text7 bg6 w-full p-b-5' type='text' name='Name'>		
					</div>
					<div class='w-size2 p-t-20'>
						<button class='flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4' name='PatientSearched' value='PatientSearched'>
							Search Patient.
						</button>
					</div>
				</form>
				</div>
				</center>";


			}
			if(isset($_GET['PatientAdded'])){
				$Type = $_GET["Type"];
				$Name = $_GET["Name"];
				$Gender = $_GET['Gender'];
				$AdmitDate = $_GET['AdmitDate'];
				$PatientID = $_GET['ID'];
				$Ward_No = $_GET['Ward_No'];
				$Age = $_GET['Age'];
				echo("Type ".$Type);
				echo("<br>");				
				$sql = "INSERT INTO patient(Patient_type, Patient_Name, Gender, Admit_From_Date, Patient_ID, Age,Ward_No) VALUES ('$Type','$Name','$Gender','$AdmitDate', '$PatientID','$Age','$Ward_No')";
				echo $sql;
				if (!mysqli_query($conn,$sql))
  				{
  					echo("<br><br>Error description: " . mysqli_error($conn));
  				}
			}
			if(isset($_GET['PatientSearched'])){
					$name = $_GET['Name'];
					$sql = "SELECT * FROM patient WHERE Patient_Name = '$name'";
					$result = mysqli_query($conn,$sql);
					echo "<br><center><p class='meet-head'>Searched Patients</p><br>";
					if ($result->num_rows > 0) 
					{    
						echo "<table class='table-shopping-cart .table-head th'>
							<tr><th>Patient Type</th>
							<th>Patient Name</th>
							<th>Ward_No</th>
							<th>Gender</th>
							<th>AdmitDate</th>
							<th>Patient ID</th>
							<th>Age</th></tr>";
						while ($row = $result->fetch_assoc()) 
						{ 
							echo "<tr><th>".$row["Patient_type"]."</th>
								  <th>".$row["Patient_Name"]."</th>
								  <th>".$row["Ward_No"]."</th>
							      <th>".$row["Gender"]."</th>
								  <th>".$row["Admit_From_Date"]."</th>
								  <th>".$row["Patient_ID"]."</th>
								  <th>".$row["Age"]."</th></tr>";
						}
								  echo "</table>";
					} else 
					{
					    echo "0 results";
					}
				
			}
			$conn->close();
		?>		
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
