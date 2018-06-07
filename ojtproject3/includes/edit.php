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
    <link rel="icon" href="../images/slulogo.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
       <a href="home.php" class="navbar-left"><img src="../images/slulogo.png" style="width:38px; float: left; padding-top: 7px; margin-right: 10px;"></a>
      <a class="navbar-brand" href="home.php" style="font-family: 'Raleway', sans-serif; font-size: 30px; font-weight: bold; color: #f2f2f2; ">iRecruit</a>
    </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="../home.php" style="  color: #f2f2f2;"><i class="fa fa-home"></i>&nbspHome</a></li>
        <li><a href="../company.php" style="  color: #f2f2f2;"><i class="fa fa-building"></i>&nbspCompany</a></li>
        <li><a href="../schedule.php" style="  color: #f2f2f2;"><i class="fa fa-calendar"></i>&nbspSchedule</a></li>
         <li class="dropdown">
          <a href="#" style="  color: #f2f2f2;"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> &nbspUser<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span>&nbspProfile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbspLogout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<a href="../schedule.php" class="btn btn-primary" style="font-family: raleway;background-color: #000040;"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
<hr>
</div>


  <div class="container" style="font-family: raleway;">

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
    $newDate = $_POST['newDate'];
    $newTime1 = $_POST['newTime1'];
    $newTime2 = $_POST['newTime2'];
    $newSlots = $_POST['newSlots'];


    $id  = $_POST['id'];
    $sql  = "UPDATE events SET event_name='$newName', event_desc='$newDesc', event_Venue='$newVenue', time1='$newTime1', time2='$newTime2', available_slot='$newSlots', event_date='$newDate' WHERE id='$id'";
    $res = mysqli_query($con,$sql) or die("Could not update".mysqli_error($con));
    echo "<meta http-equiv='refresh' content='0;url=../schedule.php'>";
  }
    

?>
  <form  class="form-group" action="edit.php" method="POST">
  
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  
  Event Name: <input class="form-control" type="text" name="newName" value="<?php echo $row[1];?>"><br>
  
  Event Description: <input class="form-control"type="text" name="newDesc" value="<?php echo $row[2];?>"><br>
  
  Venue: <input class="form-control" type="text" name="newVenue" value="<?php echo $row[3];?>"><br>
  
  
  Time:<br> 
  <div class="row">
  <div class="col-lg-4"> 
  <input class="form-control" type="time" name="newTime1" value="<?php echo $row[4];?>"> 
  </div> 
  <div class="col-lg-4">
  <input class="form-control" type="time" name="newTime2" value="<?php echo $row[6];?>">
  </div><br>
  </div><br>
 
  Date:<input class="form-control" type="Date" name="newDate" value="<?php echo $row[7];?>"><br>
  
  Available Slots: <input class="form-control" type="text" name="newSlots" value="<?php echo $row[5];?>"><br>
  <button class="btn btn-primary" type="submit" style="font-family: raleway;"><span class="glyphicon glyphicon-edit"></span> Edit</button>
  <button class="btn btn-danger" type="submit" formaction="../schedule.php" style="font-family: raleway"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
  </form>


</div>

</body>
</html>
