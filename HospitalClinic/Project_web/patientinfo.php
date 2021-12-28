<?php
	// Make info page

	// Connect to DB
	$myDB = new SQLite3("Hospital.db");
    if(!isset($myDB)) {
        die('Not connected to db');
    }


    $query= "SELECT p_name, p_patientID, d_name, n_name,p_number, p_address, p_email, ph_medicineName, ph_surgeryName, ph_comments FROM Patient, Doctor, Nurse, PatientHistory WHERE p_demployeeID=ph_employeeID  and p_demployeeID=d_employeeID and ph_patientID=p_patientID and p_nemployeeID=n_employeeID and p_name = :pname;";
    #$query = "SELECT d_name,p_patientID,ph_medicineName, ph_surgeryName, n_name, ph_comments, p_address, p_email from Doctor, Patient, PatientHistory, Nurse where d_employeeID = ph_employeeID and p_patientID=n_patientID and d_patientID=n_patientID and p_name = :name;";
	$statement = $myDB->prepare($query);
	$statement->bindParam(':pname', $_POST['name']);
	$statement->bindParam(':dname', $_POST['pdoctor']);
	$result = $statement->execute();

	if(isset($_POST['infoSubmit'])) { // Check if the user clicked "Details"
	$row=$result->fetchArray(SQLITE3_ASSOC);
?> 
	<form action="proccess_update.php" method="post">
		
		<img src="profile.png" align="left" style="margin-left:20%;margin-top:10%; position:absolute;" width="150" height="200">
		 <center><h1 style="font-family: Impact;font-size:3.3em;color:navy;"> <?php echo $row['p_name']?> </h1> </center>
	  <!--Name:<br>-->
	  <input type="hidden" name="pname" value="<?php echo $row['p_name']?>">
	  <br>

	  <center>
	  Address:
	  <input type="text" name="paddress" value="<?php echo $row['p_address'];?>"></center>

	  <center> 
	  Phone Number:
	  <input type="text" name="pnumber" value="<?php echo $row['p_number'];?>"></center>

	  <center> 
	  Email:
	  <input type="text" name="pemail" value="<?php echo $row['p_email'];?>"></center>
	  <br>

	  <center>
	  Doctor Name:<br>
	  <input type="text" name="dname" value="<?php echo $row['d_name'];?>"></center>

	  <center>
	  Nurse Name:<br>
	  <input type="text" name="nname" value="<?php echo $row['n_name'];?>"></center>
	
	  <center>
	  Medicine Given:<br>
	  <input type="text" name="pmedicine" value="<?php echo $row['ph_medicineName'];?>"></center>
	  
	  <center>
	  Surgery Given:<br>
	  <input type="text" name="psurgery" value="<?php echo $row['ph_surgeryName'];?>"></center>
	 
	  <center>
	  Comments:<br>
	  <input type="text" name="pcomments" value="<?php echo $row['ph_comments'];?>"></center>
	  <br>
	  <br>

	  <center>
	  <input type="hidden" value="<?php echo $row['p_patientID']; ?>" name="pID">
	  <input type="submit" value="Update" name="update">
	  <input type="submit" value="Delete Patient" name="delete">
	  <input type="submit" value="Add Surgery" name="surgery">
	</center>
	</form> 
<?php } ?>	
</html>
