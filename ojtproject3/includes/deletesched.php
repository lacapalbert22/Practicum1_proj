<?php
    include_once('dbh.inc.php');
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['delsched'];
    $id2 = $_GET['view'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM date WHERE date_id='$id'";
    $result = mysqli_query($connect, $query);
    mysqli_close($connect); 
    

   header("Refresh:0; url=viewschedule.php?view=$id2");
?>



