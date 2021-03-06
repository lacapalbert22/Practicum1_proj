<!DOCTYPE html>
<html>
<?php
  include 'includes/dbh.inc.php';
  require 'includes/checklogin.php';
?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="icon" href="images/slulogo.png">
  <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
</head>

<style>
@import url('https://fonts.googleapis.com/css?family=Raleway');
@import url('https://fonts.googleapis.com/css?family=Quicksand');
@import url('https://fonts.googleapis.com/css?family=Lobster+Two');
body{
  font-size: 20px; 
}
li a{
  font-size: 18px;
  font-family: 'Raleway', sans-serif;

}

</style>

<body>

  <nav class="navbar navbar-default" style="background-color: #000040; height: 57px; border-bottom: 6px solid #B8860B; ">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <a href="home.php" class="navbar-left"><img src="images/slulogo.png" style="width:38px; float: left; padding-top: 7px; margin-right: 10px;"></a>
      <a class="navbar-brand" href="home.php" style="font-family: 'Raleway', sans-serif; font-size: 30px; font-weight: bold; color: #f2f2f2; ">iRecruit</a>
    </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php" style="  color: #f2f2f2;"><i class="fa fa-home"></i>&nbspHome</a></li>
        <li><a href="company.php" style="  color: #f2f2f2;"><i class="fa fa-building"></i>&nbspCompany</a></li>
        <li><a href="schedule.php" style="  color: #f2f2f2;"><i class="fa fa-calendar"></i>&nbspSchedule</a></li>
         <li class="dropdown">
          <a href="#" style="  color: #f2f2f2;"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> &nbspUser<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span>&nbspProfile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbspLogout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container" style=" font-size: 28px; font-family: 'Quicksand', sans-serif;">
    <center style="font-size: 45px; font-family: 'Lobster Two', cursive; font-weight: bold;">Upcoming Events</center>
    <hr>
    
      <div>
      <?php
          $sql = "SELECT  *,
              (DATEDIFF(event_date, curdate()))as 'Days Left',
              concat(monthname(event_date),' ',DAY(event_date),',',year(event_date)) as 'Date',
              company.company_logo
              FROM events  inner join company on events.company_fk = company.company_id
              WHERE event_date > curdate()
              ORDER BY event_date ASC";
          $result = mysqli_query($con,$sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
             echo "<div class='jumbotron' style='background-color: #000040;color: #f2f2f2;border: 2px solid #B8860B;'>";
             echo '<img src="images/company/'.$row['company_logo'].'" style="background-color: white; width: 400px; height: 150px; border: 3px solid #B8860B; border-radius: 10px;"><br>';
             echo '<b>What: </b>'.$row['event_name'].'<br>';
             echo '<b>When: </b>'.$row['Date'].' &nbsp <b>Time:</b> '.$row['time1'].'-'.$row['time2'].' <br>';
             echo '<b>Where: </b>'.$row['event_venue'].'<br>';
             echo '<b>Days Left:</b> '.$row['Days Left'].' &nbsp <b>Available Slots:</b> '.$row['available_slot'].' <br>';
             echo "</div>";  
             echo "<hr>";


         }
      }
      ?>  
      </div>
    </div>

</body>
</html>
