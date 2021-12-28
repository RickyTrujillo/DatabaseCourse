<?php
	$db = new SQLite3('Hospital.db');

	if(!$db) {
		die("DB not connected");
	}

	if (isset($_POST['update'])){
		$query = "Update Patient SET p_name='{$_POST['pname']}', p_address='{$_POST['paddress']}', p_email='{$_POST['pemail']}' WHERE p_patientID='{$_POST['pID']}';";
		$db->exec($query);
		header("Location: patients.php");
		
	} else if (isset($_POST['surgery'])){
		$query="SELECT d_employeeID FROM Doctor WHERE d_name='{$_POST['dname']}';";
			$statement = $db->prepare($query);
			$result = $statement->execute();
			$row=$result->fetchArray(SQLITE3_ASSOC);
?>
		<form></form>
			<form action="surgery_add.php" method="post">
				Patient ID: <br>
				<input type="text" name="pID" value="<?php echo $_POST['pID'] ?>"> <br> 
				Doctor ID: <br> 
				<input type="text" name="dID" value="<?php echo $row['d_employeeID'];?>"> <br> 
				Medicine Name: <br> 
				<input type="text" name="medicine" placeholder="Medcine Name"> <br> 
				Surgery Name: <br> 
				<input type="text" name="surgery" placeholder="Surgery Name"> <br> 
				Comments: <br> 
				<input type="text" name="comments" placeholder="Comments"> <br> 
				<br> 
				<button type="submit" name='submit'>Submit</button>
				<button type="button"> <a href= "patients.php" style="text-decoration: none; color:black"> Cancel </a></button>
			</form>

<?php 
}else if(isset($_POST['delete'])){
		#$query = "Delete * from Patient,PatientHistory,Transaction, Nurse, Doctor, where p_patientID=ph_patientID and ph_patientID=t_patientID and t_patientID=n_patientID and n_patientID=d_patientID and p_name=:name";
		$query="SELECT p_patientID FROM Patient WHERE p_name='{$_POST['pname']}';";
		$statement = $db->prepare($query);
		$result = $statement->execute();
		$row=$result->fetchArray(SQLITE3_ASSOC);

		$query="DELETE FROM Patient WHERE p_name='{$_POST['pname']}';";
		$db->exec($query);

		$query="DELETE FROM Doctor WHERE d_patientID='{$row['p_patientID']}';";
		$db->exec($query);

		$query="DELETE FROM PatientHistory WHERE ph_patientID='{$row['p_patientID']}';";
		$db->exec($query);

		$query="DELETE FROM Nurse WHERE n_patientID='{$row['p_patientID']}';";
		$db->exec($query);

		header("Location: patients.php");
	}else{
		header("Location: patients.php");
	}
	$db->close();
?>