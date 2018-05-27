<!DOCTYPE html>
<html>
<?php
  include 'includes/dbh.inc.php';
  require 'includes/checklogin.php';
?>
<head>
  <style type="text/css">body{ font-family:'Tajawal';} </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="icon" href="images/slulogo.png">
  <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
</head>
<body>
  <style type="text/css">body{ font-family:'Tajawal'; font-size: 20px;} li a{font-size:18px;} </style>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <a href="home.php" class="navbar-left"><img src="images/slulogo.png" style="width:30px; float: left; padding-top: 10px;margin-right:5px;"></a>
      <a class="navbar-brand" href="home.php">iRecruit</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="company.php"><i class="fa fa-building"></i> Company</a></li>
        <li><a href="schedule.php"><i class="fa fa-calendar"></i> Schedule</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> User<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span> Profile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
   
    <center><h1>Upcoming Events</h1></center>
    <hr>
    
    <?php
        $sql = "SELECT * FROM events";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
    
    
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

        
           echo '<b>Event name:</b> '.$row['event_name'].'<br>';
           echo '<b>Event Description:</b> '.$row['event_desc'].'<br>';
           echo '<b>Event Date:</b> '.$row['event_date'].'<br>';
           echo '<b>Time:</b> '.$row['time1'].'-'.$row['time2'].'<br>';
           echo '<b>Available Slots:</b> '.$row['available_slot'].'<br><hr>';

               
       }
    }
    ?>  

    </div>

</body>
</html>
