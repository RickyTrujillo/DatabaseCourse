<?php
	$db = new SQLite3('Hospital.db');

	if(!$db) {
		die("DB not connected");
	}

	if (isset($_POST['delete'])){
		#$query = "Delete * from Patient,PatientHistory,Transaction, Nurse, Doctor, where p_patientID=ph_patientID and ph_patientID=t_patientID and t_patientID=n_patientID and n_patientID=d_patientID and p_name=:name";
		$query="DELETE FROM Patient WHERE p_name='{$_POST['pname']}';";
		$db->exec($query);
		header("Location: patients.php");
	}	
	else {
		header("Location: patients.php");
	}



	$db->close();
?>