<html>

<style>

table{
	width:50%;
	height:30%;
	border-collapse:collapse; 
	text-align: center;
	margin-top: 7%;
	margin-right:10%;
}

th{
	background-color:#588c7e;
	color:white;
}


tr: nth-child(even){
	background-color:#f2f2f2;
	}
</style>

<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel = "stylesheet" type = "text/css" href = "search.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="navigation">
<button class="btn"><a href="home.php"><i class="fa fa-home"></i></a></button>
</div>

<?php
	// Make info page

	// Connect to DB
	$myDB = new SQLite3("Hospital.db");
    if(!isset($myDB)) {
        die('Not connected to db');
    }

    #$query= "SELECT COUNT(p_name) as patientNUM, COUNT(ph_surgeryName) as surgeryNum, COUNT(ph_medicineName) as medicineNum FROM Doctor, PatientHistory, Patient "

    $query = "SELECT COUNT(distinct p_name) as patientNum, COUNT(ph_surgeryName) as surgeryNum, COUNT(ph_medicineName) as medicineNum from Doctor, PatientHistory, Patient where p_patientID=ph_patientID and d_employeeID=ph_employeeID and ph_patientID=d_patientID and d_name = :name and ph_surgeryName<>'';";
	$statement = $myDB->prepare($query);
	$statement->bindParam(':name', $_POST['id']);
	$result = $statement->execute();

	if(isset($_POST['infoSubmit'])) { // Check if the user clicked "Details"
	$row=$result->fetchArray(SQLITE3_ASSOC)
?> 

	<img src="<?php echo $_POST['id']?>.jpg" align="left" style="margin-left:5%" width="400" height="433">
	<table align="right"> 
	<form action="surgery.php" method="post">
		<tr> 
			<th>Doctor Name</th>
			<th>Surgeries Done</th>
			<th>Number of Medications Prescribed:</th>
			<th>Number of Patients:</th>
		</tr>
		<tr>
	  <!--Doctor Name:-->
	  <td><input type="text" name="dname" value="<?php echo $_POST['id'];?>"></td>
	  <!--Surgeries Done:-->
	  <td><input type="text" name="surgery" value="<?php echo $row['surgeryNum'];?>"></td>
	  <!--Number of Medications Prescribed:-->
	  <td><input type="text" name="mNum" value="<? echo $row['medicineNum'];?>"></td>
	  <!--Number of Patients:-->
	  <td><input type="text" name="pNum" value="<? echo $row['patientNum'];?>"></td>
	</tr>
	  <!--<button type="submit" name="surgery">Add Surgery</button>-->
	</form> 
	</table>
<?php
}	
	else {
		header("Location: patients.php");
	}
?>
</body>
</html>