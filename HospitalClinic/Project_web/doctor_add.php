<?php
	session_start();
	$db = new SQLite3('Hospital.db');

	if(!$db) {
		die("DB not connected");
	}

	if (isset($_POST['doctorAdd'])){
			$query= "INSERT INTO Employee(e_employeeID, e_name, e_gender, e_jobTitle) VALUES('{$_POST['id']}','{$_POST['name']}','{$_POST['gender']}','{$_POST['jobTitle']}');";
			$db->exec($query);

			$query="INSERT INTO Doctor(d_employeeID,d_patientID, d_name, d_dptName, d_specialization) VALUES('{$_POST['id']}','', '{$_POST['name']}','{$_POST['department']}','{$_POST['specialization']}');";
			$db->exec($query);
			header("Location: doctors.php");

			$query="INSERT INTO Department(dpt_dptName, dpt_employeeID, dpt_departmentID) VALUES('{$_POST['department']}', '{$_POST['id']}','');";
			$db->exec($query);

			$query="INSERT INTO Users(username, password) VALUES ('doctor', 'password');";
			$db->exec($query);
			header("Location: doctors.php");

		#$query = "INSERT INTO Doctor(d_employeeID,d_patientID,d_name,d_dptName,d_specialization) VALUES('{$_POST['id']}',  ,'{$_POST['name']}','{$_POST['department']}','{$_POST['specialization']}') WHERE d_employeeID= '{$row['d_employeeID']}';";
		#$db->exec($query)
		#header("Location: doctors.php");
	}	
	else {
		header("Location: doctors.php");
	}
	$db->close();
?>