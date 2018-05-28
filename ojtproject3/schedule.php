<!DOCTYPE html>
<?php
 include 'includes/dbh.inc.php';
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
<center style="font-size: 55px; font-family: 'Lobster Two', cursive; font-weight: bold;">Schedule</center>
<hr>
</div>

<div class="container-fluid" align="center">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsched">
 <span class="glyphicon glyphicon-plus"></span> Add Schedule
</button>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Add Schedule</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="includes/add.php" autocomplete="off">
      

        Company:<br>
        <div class="form-group">
         <select class="form-control" name="company">
      <?php

             $sql = "select * from company ";
            $result = mysqli_query($con,$sql);
            $resultCheck = mysqli_num_rows($result);
        /*$row = mysqli_fetch_array($result);*/
        
            if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            extract($row);

              echo '<option value="'.$row['company_id'].'">'.$row['company_name'].'</option>';

                }
              }
            ?>
          </select>
          </div>

        Event Name:<br>
        <input class="form-control" type="text" name="companyname"  placeholder="Name" required><br>
        
        Event Description:<br>
        <input class="form-control" type="text" name="companydesc" required><br>
        Venue:<br> 
        <input class="form-control" type="text" name="venue"  placeholder="Venue" required><br>
        
        <div class="form-row">
        Time:<br>
        <div class="col-sm-6">
        <input class="form-control" type="time" name="time1"  required> 
        </div>
        <div class="col-sm-6">
        <input class="form-control" type="time" name="time2" placeholder="Time" required min="7:00 AM" max="4:00 PM">
        </div><br>
        </div><br>
        Date:<br> 
        <input class="form-control" type="date" name="date" required><br>
        Available Slots:<br> 
        <input class="form-control" type="text" name="availableslot"  required><br>
        <hr>
        <button class="btn btn-primary" type="submit" name="Submit">Add</button> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        
        $sql = "select * , company_logo from events inner join company on events.company_fk=company.company_id order by event_date DESC";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
        /*$row = mysqli_fetch_array($result);*/
        
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);


        echo '<div class="card">';
        echo '<card class="body">';
        echo'<img src="images/company/'.$row['company_logo'].'" alt="" style="max-height: 100px; max-width: 300px;min-height: 100px; min-width: 300px;">';
           echo  '</card></div>';
           echo 'Event Name:'.$row['event_name'].'<br>';
           echo 'Event Description:'.$row['event_desc'].'<br>';
           echo 'Venue:'.$row['event_venue'].'<br>';
           echo 'Time:'.$row['time1'];
           echo '-'.$row['time2'].'<br>';
           echo 'Date:'.$row['event_date'].'<br>';
           echo "<a class='btn btn-primary' href='includes/edit.php?edit=$row[id]' ><span class='glyphicon glyphicon-edit'></span> Edit</a> ";
           echo "<a class='btn btn-primary' href='includes/viewschedule.php?view=$row[id]'><span class='glyphicon glyphicon-th-list'></span> View Schedule</a>";
          ?>
          <!--
          <a class ='btn btn-primary' href='includes/delete.php?delete=$row[id]'><span class="glyphicon glyphicon-remove-circle"></span> Delete</a><hr>-->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"><span class="glyphicon glyphicon-remove-circle"></span> Delete
          </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete this event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure?
              </div>
              <div class="modal-footer">
                <form method="POST" action="includes/delete.php?delete=<?php echo $row['id']; ?>">
                <input class="btn btn-primary" type="submit" value="Submit" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>

              </div>
            </div>
          </div>
        </div>
        <hr>
        
        <?php




          }
          }

        ?>  

</div>
</div>

</body>
</html>
