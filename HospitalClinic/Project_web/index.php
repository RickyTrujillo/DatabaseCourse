<?php
    session_start();
?>

<html>
    <head>
            <title>Login Form Design</title>
            <link rel = "stylesheet" type = "text/css" href = "style.css">
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel = "stylesheet" type = "text/css" href = "search.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
            <body>
                <div class= "loginbox">
                    <p> <?php if(isset( $_SESSION['error']))echo  $_SESSION['error']; ?>
                    <img src = "icons1.jpg" class = "icons1" >
                    <h1>Sign In</h1>
                    <form action="login.php" method="post">
                        <p>Username</p>
                        <input type="text" name = "username" placeholder = "Enter Username">
                    <p>Password</p>
                    <input type= "password" name = "password" placeholder = "Enter Password">
                    <input type = "submit" name = "login" value = "login">
                    </form>
                </div>
            </body>
            
    </html>