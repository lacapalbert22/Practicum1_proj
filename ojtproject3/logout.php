<<<<<<< HEAD
<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['password']);  
    header("Location: index.php")
=======
<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['password']);  
    header("Location: index.php")
>>>>>>> 6e225d05c517cd22e65f5d8607da00eb4cf47fe2
?>