<<<<<<< HEAD
<?php
    include_once('dbh.inc.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['deletepar'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM `participants` WHERE `par_id` = $id";
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


   header("Refresh:0; url=../viewparticipant.php?viewparticipant=$id");
?>



=======
<?php
    include_once('dbh.inc.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['deletepar'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM `participants` WHERE `par_id` = $id";
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


   header("Refresh:0; url=../schedule.php?id=$id")
?>



>>>>>>> 6e225d05c517cd22e65f5d8607da00eb4cf47fe2
