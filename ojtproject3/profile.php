<?php
	require_once 'includes/dbh.inc.php';
	require 'includes/checklogin.php';

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/slulogo.png">
  <style>
    body{
        background-color: #373C42;
    }
    .container{
        margin-top: 10px;
        background-color: white;
        width: 1250px;
        margin: 0 auto 0 auto;
        border-radius: 20px;
        background: rgba(255,255,255,0.8);
    }
    img{
        margin: 100px;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">iRecruit</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="home.php"><i class="fa fa-home"></i>&nbspHome</a></li>
                <li><a href="company.php"><i class="fa fa-building"></i>&nbspCompany</a></li>
                <li><a href="schedule.php"><i class="fa fa-calendar"></i>&nbspSchedule</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbspUser<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container boxes">
        <div class="row">
            <div class="col-md-5 border rounded" >
                <img src="images/sirbench.jpg" alt="" style="width: 300px; height: 300px; border-radius: 25px; border-style: outset;" >
            </div>
            <div class="col-md-7 border rounded">
                
            </div>
        </div>
    </div>

</body>
</html>