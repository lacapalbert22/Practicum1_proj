<?php
    include_once('dbh.inc.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['deltime'];
    $id2 = $_GET['view'];
    $id3 = $_GET['time'];
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM time WHERE `time_id` = $id";
    $result = mysqli_query($connect, $query);  
    /**
    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
    **/
    mysqli_close($connect); 


   header("Refresh:5; url=viewtime.php?time=$id3&view=$id2");
?>



