<<<<<<< HEAD
<?php
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
        header("Location:logout.php");
        exit();
    }
=======
<?php
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
        header("Location:logout.php");
        exit();
    }
>>>>>>> 6e225d05c517cd22e65f5d8607da00eb4cf47fe2
?>