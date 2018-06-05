3<?php
    include_once('dbh.inc.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['delete'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM `events` WHERE `id` = $id";
    $result = mysqli_query($connect, $query);
    mysqli_close($connect); 
    

   header("Refresh:0; url=../schedule.php")
?>



