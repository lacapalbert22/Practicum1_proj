<?php
    include_once('dbh.inc.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
     $con = mysqli_connect($hostname, $username, $password, $databaseName);


    $delpar = $_GET['deletepar'];
    $id = $_GET['par'];
    $id2= $_GET['view'];
    $id3= $_GET['date'];
    // connect to mysql
    // mysql delete query 
    $sql = "DELETE FROM participants WHERE par_id = $delpar"; 
   
   if ($con->query($sql) === TRUE) {
            header("Refresh:0; url=viewparticipant.php?par=$id&view=$id2&date=$id3");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $con->close();     
?>



