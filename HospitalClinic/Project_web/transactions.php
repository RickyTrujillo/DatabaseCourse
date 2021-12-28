<html>
<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel = "stylesheet" type = "text/css" href = "search.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="navigation">
<button class="btn"><a href="home.php"><i class="fa fa-home"></i></a></button>
</div>

<div class="search">
				<form action="/transactions.php" method="GET">
					Enter Patient Name:
					<input type="text" value="" placeholder="i.e. John Doe" name="filter" style="margin-top:10px">
					<button type="submit" name="filter_submit"> Search </button>
					<button type="submit" name="update"> Update </button><br>
 				</form>
<?php
	$myDB = new SQLite3("Hospital.db");
    	if(!isset($myDB)) {
       	  die('Not connected to db');
    	}

	if (isset($_GET['filter_submit'])){
		if(!empty($_GET['filter'])) {
		#$query= "SELECT p_patientID from Patient where p_name='{$_GET['filter_submit']}';";
		#$statement = $myDB->prepare($query); 
		#$result = $statement->execute();

		#if($row=$result->fetchArray(SQLITE3_ASSOC)){

		$query="SELECT t_transactionNum, p_patientID, SUM(t_total) as total, t_creditNum, t_debitNum, t_paymentDate, t_status from Patient, Transactions WHERE t_patientID=p_patientID AND t_patientID=(SELECT p_patientID from Patient where p_name='{$_GET['filter']}');";

		$statement = $myDB->prepare($query); 
		$result = $statement->execute();
		$row=$result->fetchArray(SQLITE3_ASSOC);
 ?>

 <?php } ?>
 Transaction Number:<br>
 <input type="text" name="transNum" value="<?php echo $row['t_transactionNum']?>" ><br>
 Total:<br>
 <input type="text" name="total" value="<?php echo $row['total']?>" ><br>
 Credit Card:<br>
 <input type="text" name="creditNum" value="<?php echo $row['t_creditNum']?>" ><br>
 Debit Card:<br>
 <input type="text" name="debitNum" value="<?php echo $row['t_debitNum']?>" ><br>
 Payment Date:<br>
 <input type="text" name="paymentDate" value="<?php echo $row['t_paymentDate']?>" ><br>
 Status:<br>
 <input type="text" name="status" value="<?php echo $row['t_status']?>" ><br>

<?php } ?>

 <?php $myDB->close() ?>
</div>
</html>