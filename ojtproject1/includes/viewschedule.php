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
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="../home.php">iSLU</a>
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
  <h1>View Schedule</h1>
  <hr>
</div>

<div class="container">
       <?php
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);


           echo '<p>Event Name:'.$row['event_name'].'</p><br>';
           echo '<p>Event Description:'.$row['event_desc'].'</p><br>';
           echo '<p>Event Venue:'.$row['event_venue'].'</p><br>';
           echo '<p>Event Time:'.$row['time1'].'-';
           echo  $row['time2'].'</p><br>';
           echo '<p>Date:'.$row['event_date'].'</p><br>';
           echo '<p>Slots Available:'.$row['available_slot'].'</p><br>';

       }
        
        ?>  

</div>

       

        <?php
        
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);
        
 


           echo "<div class='container'><a class='btn btn-primary' href='viewpar.php?viewpar=$id'>View Participants</a>";

        }

         ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Parcipants
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Add Participants</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST' action='addpar.php?addpar=<?php echo $id ?>' autocomplete='off'>
        Last name:<br><input type="text" name="parlastname"  required><br>   
        First Name:<br><input type="text" name="parfirstname" required><br>
        Middle Initial:<br> <input type="text" name="parmi"  required><br>
        Email:<br><input type="text" name="paremail"><br>
        Contact:<br> <input type="text" name="parcontact" required><br><hr>       
        <button class="btn btn-primary" type="submit" name="Submit">Add</button> 
        <button class="btn btn-primary" type="submit" name="Cancel" formaction="schedule.php">Cancel</button> 

         </form>

          
      </div>
     
    </div>
  </div>
</div>

   


         


</body>
</html>
