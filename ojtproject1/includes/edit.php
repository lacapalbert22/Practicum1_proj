<!DOCTYPE html>
<?php
 include 'dbh.inc.php';
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

  <?php
  include_once('dbh.inc.php');
 
  if( isset($_GET['edit']) )
  {
    $con = mysqli_connect('localhost', 'root', '', 'sample');
    $id = $_GET['edit'];
    $sql = "SELECT * FROM events WHERE id='$id'";
    $res = mysqli_query($con,$sql);
    $row= mysqli_fetch_array($res);
  }
 
  if( isset($_POST['newName']) )
  {
    $con = mysqli_connect('localhost', 'root', '', 'sample');
    $newName = $_POST['newName'];
    $newDesc = $_POST['newDesc'];
    $newVenue = $_POST['newVenue'];
    $newTime1 = $_POST['newTime1'];
    $newTime2 = $_POST['newTime2'];
    $newSlots = $_POST['newSlots'];


    $id  = $_POST['id'];
    $sql  = "UPDATE events SET event_name='$newName', event_desc='$newDesc', event_Venue='$newVenue', time1='$newTime1', time2='$newTime2', available_slot='$newSlots' WHERE id='$id'";
    $res = mysqli_query($con,$sql) or die("Could not update".mysqli_error($con));
    echo "<meta http-equiv='refresh' content='0;url=../schedule.php'>";
  }
    

?>
  <form  class="form-group" action="edit.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  
  Event Name: <input class="form-control" type="text" name="newName" value="<?php echo $row[1];?>"><br/>
  
  Event Description: <input class="form-control"type="text" name="newDesc" value="<?php echo $row[2];?>"><br/>
  
  Venue: <input class="form-control" type="text" name="newVenue" value="<?php echo $row[3];?>"><br/>
  <div class="row">
  <div class="col">
    Time: <input class="form-control" type="time" name="newTime1" value="<?php echo $row[4];?>">
  </div> - <div class="col"><input class="form-control" type="time" name="newTime2" value="<?php echo $row[6];?>">
  </div>
  </div>
  Date:<input class="form-control" type="Date" name="newDate" value="<?php echo $row[7];?>"><br/>
  
  Available Slots: <input class="form-control" type="text" name="newSlots" value="<?php echo $row[5];?>"><br/>
  <input type="submit" value="Save"/>
  <input type="submit" formaction="../schedule.php" value="Cancel"/>
  </form>

</body>
</html>
