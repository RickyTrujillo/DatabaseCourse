<?php
	$myDB = new SQLite3("Hospital.db");
    	if(!isset($myDB)) {
       	  die('Not connected to db');
    	}

	if (isset($_POST['filter_submit'])){
		if(empty($POST['filter_submit'])){
		$query= "SELECT p_patientID from Patient where p_name='{$_POST['filter_submit']}';";
		$statement = $myDB->prepare($query); 
		$result = $statement->execute();
		$row=$result->fetchArray(SQLITE3_ASSOC);

		$query="SELECT t_transactionNum, SUM(t_total), t_creditNum, t_debitNum, t_paymentDate, t_status from Patient, Transations WHERE t_patientID='{$row['p_patientID']}';";
		$statement = $myDB->prepare($query); 
		$result = $statement->execute();
		$row=$result->fetchArray(SQLITE3_ASSOC);
		header("Location: transactions.php");

	} else if (isset($_POST['update'])){
		$query= "UPDATE Transactions SET t_status='{$_POST['status']}', t_debitNum='{$_POST['debitNum']}', t_creditNum='{$_POST['creditNum']}',t_paymentDate='{$_POST['paymentDate']}' WHERE t_patientID='{$row['p_patientID']}');"; 
		 $db->exec($query);
		 header("Location: transactions.php");

	} 
	}else{
		header("Location: transactions.php");
	}

?>