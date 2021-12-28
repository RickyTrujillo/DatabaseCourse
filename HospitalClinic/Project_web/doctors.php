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
			<button type="button" class="btn btn-warning" style="float:right; margin-right:25px;margin-top:10px" data-toggle="modal" data-target="#myModal">Add Doctor</button>
			<div class="modal fade" id="myModal" role="dialog">
				    <div class="modal-dialog modal-lg">
				      <div class="modal-content">
				        <div class="modal-header">
				         <h4 class="modal-title"> Add Doctor </center></h4> 
				        </div>
				        <div class="modal-body">
				        <form action="doctor_add.php" method="post">
				          Employee ID(i.e. Employee#0000001):<br>
				          <input type="text" name="id" value="">
				          <br>
				          Name:<br>
				          <input type="text" name="name" value="">
				          <br>
				          Department:<br>
				          <input type="text" name="department" value="">
				          <br>
				          Specialization:<br>
				          <input type="text" name="specialization" value="">
				          <br>
				          Gender (M/F):<br>
				          <input type="text" name="gender" value="">
				          <br>
				          Job Title:<br>
				          <input type="text" name="jobTitle" value="DOCTOR">
				          <br>
				        </div>
				        <div class="modal-footer">
				          <button type="submit" class="btn btn-success" name="doctorAdd" style="margin-right: 25px">Submit</button>
				          </form>
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				    </div>
				  </div> 

			<div class="search">
				<form action="/doctors.php" method="get">
					<input type="text" value="" placeholder="Seach Doctor Name..." name="filter" style="margin-left:50px;margin-top:10px">
					<button type="submit" name="filter_doctor_submit"> Search </button>
				</form>
			</div>
		</div>

		<table class="table">
			<thead class="thead-dark">
				<tr>
						<th> </th>
						<th> Doctor Name </th>
						<th> Department Name </th>
						<th> Specialization</th>
				</tr>
			</thead>
	<?php
    $myDB = new SQLite3("Hospital.db");
    if(!isset($myDB)) {
        die('Not connected to db');
    }

    if (isset($_GET['filter_doctor_submit'])){
    	#filter query
    	if(!empty($_GET['filter'])) {
	    	$query = "SELECT distinct d_name,d_dptName, d_specialization FROM Doctor WHERE d_name = :name;";
	    	$statement = $myDB->prepare($query);
	    	$statement->bindParam(':name', $_GET['filter']);
	    	$result = $statement->execute();

	    	while($row=$result->fetchArray(SQLITE3_ASSOC)){

	    	?>
		    	<tr> 
		    		<td>
		    			<form method="post" action="doctorinfo.php">
		    				<input type="hidden" name="id" value="<?php echo $row["d_name"]; ?>">
		    				<button class="btn btn-primary" type="submit" name="infoSubmit">Details</button>
		    			</form>
		    		</td>
		    	<td> <?php echo $row["d_name"]; ?> </td> 
		    	<td> <?php echo $row["d_dptName"]; ?></td>
		    	<td>  <?php echo $row["d_specialization"]; ?> </td>
		    	</tr>

    		<?php
    		}
    	} else {
    	$query = "SELECT distinct d_name, d_dptName, d_specialization from Doctor group by d_name;";
	    $statement = $myDB->prepare($query);
	    $result = $statement->execute();

     	while($row=$result->fetchArray(SQLITE3_ASSOC)){
	    	?>
		    	<tr> 
		    		<td>
		    			<!-- FOr every row that was made, make a form for it -->
		    			<form method="post" action="doctorinfo.php">
		    				<!-- The line below handles the "saving" of the value of your row to the $_POST variable -->
		    				<input type="hidden" name="id" value="<?php echo $row["d_name"]; ?>">
		    				<button class="btn btn-primary" type="submit" name="infoSubmit">Details</button>
		    			</form>
		    		</td>
		    	<td> <?php echo $row["d_name"]; ?> </td> 
		    	<td> <?php echo $row["d_dptName"]; ?></td>
		    	<td>  <?php echo $row["d_specialization"]; ?> </td>
		    	</tr>
		    	
    		<?php
    	}
    }
    }else{
    	# original query
	  	$query = "SELECT distinct d_name, d_dptName, d_specialization from Doctor group by d_name;";
	    $statement = $myDB->prepare($query);
	    $result = $statement->execute();

     	while($row=$result->fetchArray(SQLITE3_ASSOC)){
	    	?>
		    	<tr> 
		    		<td>
		    			<form method="post" action="doctorinfo.php">
		    				<input type="hidden" name="id" value="<?php echo $row["d_name"]; ?>">
		    				<button class="btn btn-primary" type="submit" name="infoSubmit">Details</button>
		    			</form>
		    		</td>
		    	<td> <?php echo $row["d_name"]; ?> </td> 
		    	<td> <?php echo $row["d_dptName"]; ?></td>
		    	<td>  <?php echo $row["d_specialization"]; ?> </td>
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
