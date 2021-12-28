<html>
<style>
.button button {
  width:300px;
  height: 250px;
  border: 1px grey;
  color: white; 
  cursor: pointer; 
  margin-left:10px;
  font-size:2.2em;
  font-weight: bold;
}

.button:after {
  content: "";
  clear: both;
  display: table;
}

.button button:not(:last-child) {
  border-right: none;
}

/* Add a background color on hover */
.button button:hover {
  background-color: azure;
}

</style>
<head>
  <link rel = "stylesheet" type = "text/css" href = "search.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
<body>
<button type="button" class="btn btn-danger"> <a href="index.php" style="text-decoration: none; color:white"> Log Out </a></button>
<div class="button">
  <center> 
  <button style="background-color: #800020"><a href="patients.php" style="color:white"> Patients </a></button>
  <button style="background-color:#193CA6"><a href="doctors.php" style="color:white"> Doctors </a></button>
  <button style="background-color:gold"><a href="transactions.php" style="color:white"> Transactions </a></button>
</center>
</div>

</body>
</html>