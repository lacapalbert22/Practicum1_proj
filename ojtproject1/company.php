<!DOCTYPE html>
<?php
 include 'includes/dbh.inc.php';
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


   <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/slulogo.png">
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">iSLU</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="company.php"><i class="fa fa-building"></i>Company</a></li>
        <li><a href="schedule.php"><i class="fa fa-calendar"></i>Schedule</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="settings.php">Settings</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>
