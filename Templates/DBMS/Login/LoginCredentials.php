<?php
		$servername = "localhost";
		$username = "root";
		$password = "MeetModi08)(";
		$dbname = "hospitalmanagement";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 
	
		if(isset($_GET['Submit'])) {
			$person_id = strtoupper($_GET['person_id']);
			$password = strtoupper($_GET['password']);
		}

		$sql = "SELECT person_id, password, type FROM users WHERE person_id = '".$person_id."'";
		$sql .= " AND password = '".$password."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{    
			while ($row = $result->fetch_assoc()) 
			{ 
			    $rows[] = $row; 
			}
			foreach($rows as $row) 
			{
				$person_type = $row["type"];
    		}
		} else 
		{
		    header('Location: ../index.php');
		}
		$conn->close();

		if($person_type == "Doctor"){
			header('Location: ../Views/Doctor/index.php');			
		}
		else if($person_type == "Accountant"){

		}
		else if($person_type == "Admin"){
			header('Location: ../Views/Admin/index.php');
		}
		else if($person_type == "Labotarist"){

		}
		else if($person_type == "Nurse"){

		}
		else if($person_type == "Patient"){

		}
		else if($person_type == "Pharmacist"){

		}
		
?>