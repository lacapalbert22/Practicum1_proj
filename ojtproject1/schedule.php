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
<div class="container-fluid">
<h1>Add New Schedule</h1>
<hr>
</div>

<div class="container-fluid">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Schedule
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Add</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="includes/add.php" autocomplete="off">
        Event Name:<br>
        <input class="form-control" type="text" name="companyname"  placeholder="Name" required><br>
        
        Event Description:<br>
        <input class="form-control" type="text" name="companydesc" required><br>
        Venue:<br> 
        <input class="form-control" type="text" name="venue"  placeholder="Venue" required><br>
        Time:<br>
        <input class="form-control" type="time" name="time1"  required> -
        <input class="form-control" type="time" name="time2" placeholder="Time" required min="7:00 AM" max="4:00 PM"><br>
        Date:<br> 
        <input class="form-control" type="date" name="date" required><br>
        Available Slots:<br> 
        <input class="form-control" type="text" name="availableslot"  required><br>
        <hr>
        <button class="form-control" type="submit" name="Submit">Add</button> 
        <!--<button type="submit" name="Cancel" formaction="schedule.php">Cancel</button>-->
        </form>
        
      </div>
     
    </div>
  </div>
</div>


</div>
<hr>
<div class="container">
<div class="jumbotron">
        <?php
        
        $sql = "SELECT * FROM events";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
        /*$row = mysqli_fetch_array($result);*/
        
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);

           echo 'Event Name:'.$row['event_name'].'<br>';
           echo 'Event Description:'.$row['event_desc'].'<br>';
           echo 'Venue:'.$row['event_venue'].'<br>';
           echo 'Time:'.$row['time1'];
           echo '-'.$row['time2'].'<br>';
           echo 'Date:'.$row['event_date'].'<br>';
           echo 'Available Slot:'.$row['available_slot'].'<br>'; 
           echo "<a class='btn btn-primary' href='includes/edit.php?edit=$row[id]'>Edit</a>";
           echo "<a class='btn btn-primary' href='includes/viewschedule.php?view=$row[id]'>View Schedule</a><hr>";
           

     
          }
          }

        ?>  
</div>
</div>

</body>
</html>
