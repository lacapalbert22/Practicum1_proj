<<<<<<< HEAD
<?php
    include_once('db.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['delete'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM company WHERE company_id = $id";
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
    

   header("Refresh:0; ../company.php")
=======
<?php
    include_once('db.php');

    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $id = $_GET['delete'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // mysql delete query 
    $query = "DELETE FROM company WHERE company_id = $id";
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
    

   header("Refresh:0; ../company.php")
>>>>>>> 6e225d05c517cd22e65f5d8607da00eb4cf47fe2
?>