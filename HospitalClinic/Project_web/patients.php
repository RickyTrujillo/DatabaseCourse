<html>

<style>

table{
	width:100%;
	height:100%;
	border-collapse:collapse; 
	text-align: left;
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
			<button class="btn" style="margin-top:10px;position:absolute;"><a href="home.php"><i class="fa fa-home"></i></a></button>
			<button type="button" class="btn btn-warning" style="float:right; margin-right:25px;margin-top:10px" data-toggle="modal" data-target="#myModal">Add Patient</button>
			<div class="modal fade" id="myModal" role="dialog">
				    <div class="modal-dialog modal-lg">
				      <div class="modal-content">
				        <div class="modal-header">
				         <h4 class="modal-title"> Add Patient </center></h4> 
				        </div>
				        <div class="modal-body">
				        <form action="patient_add.php" method="post">
				          Patient ID(i.e. Patient#0000001):<br>
				          <input type="text" name="id" value="">
				          <br>
				          Patient Name:<br>
				          <input type="text" name="name" value="">
				          <br>
				          Patient Address:<br>
				          <input type="text" name="address" value="">
				          <br>
				          Patient Birthdate(yyyy-mm-dd):<br>
				          <input type="text" name="birthdate" value="">
				          <br>
				          Patient Gender(M/F):<br>
				          <input type="text" name="gender" value="">
				          <br>
				          Patient Social Security Number(###-##-####):<br>
				          <input type="text" name="SSN" value="">
				          <br>
				          Patient Phone Number (###-###-####) :<br>
				          <input type="text" name="phone" value="">
				          <br>
				          Patient Email:<br>
				          <input type="text" name="email" value="">
				          <br>
				          Attending Nurse:<br>
				          <input type="text" name="pnurse" value="">
				          <br>
				          Doctor:<br>
				          <input type="text" name="pdoctor" value="">
				          <br>
				        </div>
				        <div class="modal-footer">
				          <button type="submit" class="btn btn-success" name="add" style="margin-right: 25px">Submit</button>
				          </form>
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				    </div>
				  </div>
  
			<div class="search">
				<form action="/patients.php" method="get">
					<input type="text" value="" placeholder="Seach Patient Name..." name="filter" style="margin-left:50px;margin-top:10px">
					<button type="submit" name="filter_submit"> Search </button>
				</form>
			</div> 
		</div>

		<table class="table">
			<thead class="thead-dark">
				<tr>
						<th> </th>
						<th> Patient ID </th>
						<th> Name </th>
						<th> Address </th>
						<th> Birthdate</th>
						<th> Gender </th>
						<th> Number </th>
						<th> Email </th>
				</tr>
			</thead>
	<?php
    $myDB = new SQLite3("Hospital.db");
    if(!isset($myDB)) {
        die('Not connected to db');
    }

    if (isset($_GET['filter_submit'])){
    	#filter query
    	if(!empty($_GET['filter'])) {
	    	$query = "SELECT p_patientID,p_name,p_address, p_dateOfBirth,p_gender,p_number, p_email FROM Patient WHERE p_name = :name;";
	    	#$query = "SELECT p_patientID,p_name,p_address, p_dateOfBirth,p_gender,p_number, p_email FROM Patient WHERE p_name = :name;";
	    	$statement = $myDB->prepare($query);
	    	$statement->bindParam(':name', $_GET['filter']);
	    	$result = $statement->execute();

	    	while($row=$result->fetchArray(SQLITE3_ASSOC)){

	    	?>
		    	<tr> 
		    		<td>
		    			<form method="post" action="patientinfo.php">
		    				<input type="hidden" name="name" value="<?php echo $row["p_name"]; ?>">
		    				<button class="btn btn-primary" type="submit" name="infoSubmit">Details</button>
		    			</form>
		    		</td>
		    	<td> <?php echo $row["p_patientID"]; ?> </td> 
		    	<td> <?php echo $row["p_name"]; ?></td>
		    	<td>  <?php echo $row["p_address"]; ?> </td>
		    	<td>  <?php echo $row["p_dateOfBirth"]; ?> </td>
		    	<td>  <?php echo $row["p_gender"]; ?> </td>
		    	<td>  <?php echo $row["p_number"]; ?> </td>
		    	<td>  <?php echo $row["p_email"]; ?> </td>
		    	</tr>

    		<?php
    		}
    	} else {
		$query = "SELECT p_patientID,p_name,p_address, p_dateOfBirth,p_gender,p_number, p_email FROM Patient;";
    	#$query = "SELECT p_patientID,p_name,p_address, p_dateOfBirth,p_gender,p_number, p_email, e_employeeID FROM Patient, Employee WHERE e_name='{$_POST['pdoctor']}';";
	    $statement = $myDB->prepare($query);
	    $result = $statement->execute();

     	while($row=$result->fetchArray(SQLITE3_ASSOC)){
	    	?>
		    	<tr> 
		    		<td>
		    			<!-- FOr every row that was made, make a form for it -->
		    			<form method="post" action="patientinfo.php">
		    				<!-- The line below handles the "saving" of the value of your row to the $_POST variable -->
		    				<input type="hidden" name="name" value="<?php echo $row["p_name"]; ?>">
		    				<input type="hidden" name="ename" value="{$_POST['pdoctor']}">
		    				<button class="btn btn-primary" type="submit" name="infoSubmit">Details</button>
		    			</form>
		    		</td>
		    	<td> <?php echo $row["p_patientID"]; ?> </td> 
		    	<td> <?php echo $row["p_name"]; ?></td>
		    	<td>  <?php echo $row["p_address"]; ?> </td>
		    	<td>  <?php echo $row["p_dateOfBirth"]; ?> </td>
		    	<td>  <?php echo $row["p_gender"]; ?> </td>
		    	<td>  <?php echo $row["p_number"]; ?> </td>
		    	<td>  <?php echo $row["p_email"]; ?> </td>
		    	</tr>
		    	
    		<?php
    	}
    }
    }else{
    	# original query
    	$query = "SELECT p_patientID,p_name,p_address, p_dateOfBirth,p_gender,p_number, p_email FROM Patient;";
	  	#$query = "SELECT p_patientID,p_name,p_address, p_dateOfBirth,p_gender,p_number, p_email, e_employeeID FROM Patient, Employee WHERE e_name='{$_POST['pdoctor']}';";
	    $statement = $myDB->prepare($query);
	    $result = $statement->execute();

     	while($row=$result->fetchArray(SQLITE3_ASSOC)){
	    	?>
		    	<tr> 
		    		<td>
		    			<form method="post" action="patientinfo.php">
		    				<input type="hidden" name="name" value="<?php echo $row["p_name"]; ?>">
		    				<input type="hidden" name="ename" value="{$_POST['pdoctor']}">
		    				<button class="btn btn-primary" type="submit" name="infoSubmit">Details</button>
		    			</form>
		    		</td>
		    	<td> <?php echo $row["p_patientID"]; ?> </td> 
		    	<td> <?php echo $row["p_name"]; ?></td>
		    	<td>  <?php echo $row["p_address"]; ?> </td>
		    	<td>  <?php echo $row["p_dateOfBirth"]; ?> </td>
		    	<td>  <?php echo $row["p_gender"]; ?> </td>
		    	<td>  <?php echo $row["p_number"]; ?> </td>
		    	<td>  <?php echo $row["p_email"]; ?> </td>
		    	</tr>
		    	
    		<?php
    	}
}
?>
				</table>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
