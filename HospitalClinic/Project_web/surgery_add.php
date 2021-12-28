<?php
	session_start();
    $db = new SQLite3('Hospital.db');
	if(!$db) { die("DB not connected"); }

		if(isset($_POST['submit'])) {
			$query="UPDATE PatientHistory SET ph_medicineName='{$_POST['medicine']}',ph_surgeryName='{$_POST['surgery']}',ph_comments='{$_POST['comments']}' WHERE ph_patientID='{$_POST['pID']}' AND ph_employeeID='{$_POST['dID']}';"; 

			#$query = "Update Patient SET p_name='{$_POST['pname']}', p_address='{$_POST['paddress']}', p_email='{$_POST['pemail']}' WHERE p_patientID='{$_POST['pID']}';";


			#$query = "INSERT INTO PatientHistory(ph_patientID, ph_employeeID,ph_medicineID, ph_medicineName, ph_surgeryName, ph_comments) VALUES('{$_POST['pID']}','{$_POST['dID']}','','{$_POST['medicine']}','{$_POST['surgery']}','{$_POST['comments']}');";
			$db->exec($query);
			header("Location: patients.php");
		}else {
		header("Location: patients.php");
		}
		$db->close();
?> 