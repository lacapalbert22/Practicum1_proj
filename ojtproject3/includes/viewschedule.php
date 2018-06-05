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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="icon" href="../images/slulogo.png">
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
            <li><a href="../profile.php"><span class="glyphicon glyphicon-cog"></span>&nbspProfile</a></li>
            <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbspLogout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid" style="font-family: 'Lobster Two';">
  <h1><center><b>View Event</b></center></h1>
  <hr>
</div>

 <!--<?php
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT *,count(participants.par_id) as 'slots taken', ((`available_slot`)-(count(participants.par_id)))as 'slots avaiable' FROM `events` inner join participants on events.id = participants.date_fk WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);

        ?>-->

<div class="container">
<a href="../schedule.php" class="btn btn-default" style="background-color: #000040;color: #f2f2f2;"><span class="glyphicon glyphicon-arrow-left" ></span> Back</a>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#adddate" style="background-color: #000040;color: #f2f2f2;"><i class="glyphicon glyphicon-plus"></i> Add Date</button>
</div>
<div id="adddate" class="modal fade" role="dialog">
  <div class="modal-dialog">
<?php
        
        if( isset($_GET['view']) )
        {
          $event_fk =$_GET['view'];
?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Date for this Event</h4>
      </div>
      <div class="modal-body">
        <form action="adddate.php" method="post">
          <input type="hidden" name="event_fk" value="<?php echo $event_fk; ?>">
          <h4>Date:</h4><input class="form-control" type="date" name="date">
          <h4>Time:</h4><div class="form-row">
            <div class="col-sm-6">
            <input class="form-control" type="time" name="time1">
            </div>
            <div class="col-sm-6">
            <input class="form-control" type="time" name="time2">
            </div>
            </div>
          <h4>Venue</h4><input class="form-control" type="text" name="venue" name="venue">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Date</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
      </div>
        </form>
    </div>

  </div>
</div>

<?php

    }


?>
<hr>
</div>

<div class="container">
      

        <?php
           echo "<ul class='list-group'>"; 
           echo "<li class='list-group-item'><strong>Event Name:</strong></td><td> ".$row['event_name'].'</li>';
           echo "<li class='list-group-item'><strong>Event Description:</strong> ".$row['event_desc'].'</li></ul>';

       }
        
        ?>  


</div>
<div class="container">
     <?php
        
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * from schedule WHERE event_fk='$id' ORDER by sched_date DESC";
        $res = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($res);

         if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
           
           echo "<li class='list-group-item'>".$row['sched_date'];      
  ?>

          <a href='deletesched.php?delsched=<?php echo $row['date_id']; ?>' onclick="return confirm('Are you sure to delete this schedule?')" class='btn btn-primary' style='background-color: #000040;color: #f2f2f2;float:right;'><i class="glyphicon glyphicon-trash"></i> Delete Schedule</a>
          <a href='viewtime.php?time=<?php echo $row['date_id']; ?>&amp;view=<?php echo $id; ?>' class='btn btn-primary' style='background-color: #000040;color: #f2f2f2;float:right;'><i class='glyphicon glyphicon-list-alt'></i> View</a></ul>
               


  <?php
        }
      }
    }

    ?>
  </div>
<br>

</body>
</html>
