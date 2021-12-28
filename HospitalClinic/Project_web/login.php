<?php
    session_start();
    $myDB = new SQLite3("Hospital.db");

    if(!isset($myDB)) {
        die('Not connected to db');
    }

    if(isset($_POST['login'])) {
        $query = "SELECT * FROM Users WHERE username=:user";
        $statement = $myDB->prepare($query);
        $statement->bindParam(':user', $_POST['username']);
        $result = $statement->execute();
        if($result) {
            $row = $result->fetchArray(SQLITE3_NUM);

            if($row[1] === hash('md5', $_POST['password'])) {
                header("Location: home.php");
            }
            else {
                header("Location: index.php");
            }
        }
        else {
            $_SESSION['error'] = $myDB->lastErrorMsg();
        }
    }
?>
