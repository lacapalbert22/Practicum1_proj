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
  <h1><center><b>View Events</b></center></h1><br>
</div>

<div class="container" style="font-family: 'Raleway';">
  <hr>
  </button>
<?php
   $id = $_GET['time'];
   $id2= $_GET['view'];
?>
<a href="viewschedule.php?view=<?php echo $id2; ?>" class="btn btn-default" style="background-color: #000040;color: #f2f2f2;"><span class="glyphicon glyphicon-arrow-left" ></span> Back</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#time" style="background-color: #000040;color: #f2f2f2;" ><span class="glyphicon glyphicon-plus"></span>
  Add Time</button>

<hr>
</div><br>

<div class="modal fade" id="time" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: 'Raleway';">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Add Time</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST' action='addpar.php?addpar=<?php echo $id; ?>' autocomplete='off'>
        <div class="form-group row">
        <div class="col-xs-6">
        Time:<input class="form-control" type="time" name="time1">
        </div>
        <div class="col-xs-6" style="padding-top:27px;">
        <input class="form-control" type="time" name="time2">
        </div>
      </div>
         </div>
         <div class="form-group row">
        <div class="col-xs-8" style="padding-left: 30px;"> 
        Venue:<input class="form-control" type="text" name="venue"><br>
        </div>
        </div>
       


        <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="Submit"><i class="glyphicon glyphicon-plus"></i> Add</button> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
        </div>

         </form>

          
      </div>
     
    </div>
  </div>
</div>




<div class="container" style="font-family: 'Raleway';">
  <table class="table table-bordered">
    <th>Time</th>
    <th>Venue</th>
    <th></th>
  

     <?php
        
        if( isset($_GET['time']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['time'];
        $id2= $_GET['view'];
        $sql = "SELECT * from schedule WHERE date_id ='$id'";
        $res = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($res);
         if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($res)) {

           echo '<tr>'; 
           echo '<td>'.$row['sched_time1'].'-'.$row['sched_time2'].'</td>';
           echo '<td>'.$row['sched_venue'].'</td>';
           ?>
           
           <td><a href="deletesched.php?viewparticipant=<?php echo $row['date_id']; ?>" class='btn btn-primary' style='background-color: #000040;color: #f2f2f2;float:right;' onclick =" return confirm('are you sure you want to delete this event')"><i class='glyphicon glyphicon-remove'></i> Delete</a>
           <a href="viewparticipant.php?viewparticipant=<?php echo $row['date_id']; ?>&amp;view=<?php echo $id2; ?>" class='btn btn-primary' style='background-color: #000040;color: #f2f2f2;float:right;'><i class='glyphicon glyphicon-user'></i> View Participant</a></td>
          

          

     <?php
           echo '</tr>';

        }
      }
    }

        ?>

</table>
</div>

       


</body>
</html>
