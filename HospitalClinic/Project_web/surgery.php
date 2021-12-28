<?php 

   $db = new SQLite3('Hospital.db');
	if(!$db) { die("DB not connected"); }
		if(isset($_POST['surgery'])){
			$query="SELECT d_employeeID FROM Doctor WHERE d_name='{$_POST['dname']}';";
			$statement = $db->prepare($query);
			$result = $statement->execute();
			$row=$result->fetchArray(SQLITE3_ASSOC)
?>
			<form action="surgery_add.php" method="post">
				Patient ID: <br>
				<input type="text" name="pID" placeholder="Patient#0000000"> <br> 
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

<?php } ?>
