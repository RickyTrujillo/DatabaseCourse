<?php
	$db = new SQLite3('Hospital.db');

	if(!$db) {
		die("DB not connected");
	}

	if (isset($_POST['add'])){
		#$query= "SELECT distinct d_employeeID, d_specialization, dpt_dptName, n_employeeID FROM Doctor, Department, Nurse WHERE d_name='{$_POST['pdoctor']}' AND n_name='{$_POST['pnurse']}' AND dpt_employeeID=(SELECT d_employeeID FROM Doctor WHERE d_name='{$_POST['pdoctor']}');";
		$query= "SELECT d_employeeID, d_specialization, dpt_dptName, n_employeeID FROM Doctor, Department, Nurse, Patient WHERE d_name='{$_POST['pdoctor']}' AND d_employeeID=dpt_employeeID and p_patientID=n_patientID and n_name='{$_POST['pnurse']}';";
		$statement = $db->prepare($query);
		$result = $statement->execute();
		$row=$result->fetchArray(SQLITE3_ASSOC);

		$query = "INSERT INTO Patient(p_patientID,p_demployeeID, p_nemployeeID,p_name,p_address,p_dateOfBirth,p_gender,p_SSN,p_number,p_email) VALUES('{$_POST['id']}','{$row['d_employeeID']}','{$row['n_employeeID']}', '{$_POST['name']}','{$_POST['address']}','{$_POST['birthdate']}','{$_POST['gender']}','{$_POST['SSN']}','{$_POST['phone']}','{$_POST['email']}');";
		$db->exec($query);

		#$query="INSERT INTO Patient(p_patientID, p_demployeeID, p_nemployeeID, p_name, p_address, p_dateOfBirth, p_gender, p_SSN, p_number, p_email) VALUES ( '{$_POST['id']}' , '{$row['d_employeeID']}' , '{$row['n_employeeID']}' , '{$_POST['name']}' , '{$_POST['address']}'  , '{$_POST['birthdate']}'  , '{$_POST['gender']}'  , '{$_POST['SSN']}','{$_POST['number']}', '{$_POST['email']}');";
		$db->exec($query);

		#$query = "SELECT n_employeeID FROM Nurse WHERE n_name='{$_POST['pnurse']}';";
		#$statement = $db->prepare($query);
		#$result = $statement->execute();
		#$row=$result->fetchArray(SQLITE3_ASSOC);
		
		$query="INSERT INTO Nurse(n_employeeID, n_patientID, n_name) VALUES('{$row['n_employeeID']}','{$_POST['id']}','{$_POST['pnurse']}')";
		$db->exec($query);

		#$query= "SELECT dpt_dptName FROM Department where dpt_employeeID='{$row['d_employeeID']}';";
		#$statement = $db->prepare($query);
		#$result = $statement->execute();
		#$row=$result->fetchArray(SQLITE3_ASSOC);

		$query="INSERT INTO Doctor(d_employeeID, d_patientID, d_name, d_dptName, d_specialization) VALUES('{$row['d_employeeID']}','{$_POST['id']}','{$_POST['pdoctor']}', '{$row['dpt_dptName']}', '{$row['d_specialization']}');";
		$db->exec($query);

		$query="INSERT INTO PatientHistory(ph_patientID, ph_employeeID, ph_medicineID, ph_medicineName, ph_surgeryName, ph_comments) VALUES('{$_POST['id']}','{$row['d_employeeID']}','', '','','');";
		$db->exec($query);

		$query="INSERT INTO Transactions(t_patientID,t_transactionNum, t_total, t_creditNum, t_debitNum, t_paymentDate, t_status) VALUES('{$_POST['id']}' , '', '', '','','','I');";
		$db->exec($query);

		header("Location: patients.php");
	}	
	else {
		header("Location: patients_add.php");
	}
	$db->close();
?>