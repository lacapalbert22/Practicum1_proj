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
     <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
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
<center style="font-size: 55px; font-family: 'Lobster Two', cursive; font-weight: bold;">Events</center>
<hr>
</div>

<div class="container-fluid" style="font-family: 'Raleway';">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsched" style="background-color: #000040;color: #f2f2f2;">
 <span class="glyphicon glyphicon-plus"></span> Add Schedule
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#archives" style="background-color: #000040;color: #f2f2f2;">
 <i class="glyphicon glyphicon-th-list"></i> 
 <a href="archives.php" style="text-decoration: none; color: white;">Archives</a>
</button>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addsched" tabindex="-1" role="dialog" aria-labelledby="addshed" aria-hidden="true" style="font-family: 'Raleway';">
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
        <textarea class="form-control" type="text" name="companydesc" placeholder="Description"required rows="5"></textarea><br>
        Venue:<br> 
        <input class="form-control" type="text" name="venue"  placeholder="Venue" required><br>
        
        <div class="form-row">
      Time:<br>
        <div class="col-sm-6">        
        <input class="form-control" type="time" name="time1"> 
        </div>
        <div class="col-sm-6">
        <input class="form-control" type="time" name="time2">
        </div><br>
        </div><br>
        Date:<br> 
        <input class="form-control" type="date" name="date" required><br>
        Available Slots:<br> 
        <input class="form-control" type="text" name="availableslot"  required><br>
        <hr>
        <button class="btn btn-primary" type="submit" name="Submit"><i class="glyphicon glyphicon-plus"></i> Add</button> 
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>
        </form>
        
      </div>
     
    </div>
  </div>
</div>


</div>
<hr>


<div class="container" style="font-family: 'Raleway';">
        <?php
        
        $sql = "select * , company_logo from events inner join company on events.company_fk=company.company_id
         where curdate() < event_date
         order by event_date ASC";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
        /*$row = mysqli_fetch_array($result);*/
        
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);

        echo "<div class='jumbotron'style='background-color: #000040;color: #f2f2f2;border: 2px solid #B8860B;'>";
        echo '<div class="card"><center>';
        echo '<card class="body">';
        echo'<img src="images/company/'.$row['company_logo'].'" style="max-height: 100px; max-width: 300px;min-height: 100px; min-width: 300px; background-color:white;border-radius:10px;padding:10px;">';
           echo  '</card></center></div><br><br>';
           echo 'Event Name:'.$row['event_name'].'<br>';
           echo 'Event Description:'.$row['event_desc'].'<br>';
           echo 'Venue:'.$row['event_venue'].'<br>';
           echo 'Time:'.$row['time1'];
           echo '-'.$row['time2'].'<br>';
           echo 'Date:'.$row['event_date'].'<br><hr>';
           echo "<a class='btn btn-default' href='includes/edit.php?edit=$row[id]' ><span class='glyphicon glyphicon-edit'></span> Edit</a> ";
           echo "<a class='btn btn-default' href='includes/viewschedule.php?view=$row[id]'><span class='glyphicon glyphicon-th-list'></span> View Schedules</a>";

          ?>
          <!--
          <a class ='btn btn-primary' href='includes/delete.php?delete=$row[id]'><span class="glyphicon glyphicon-remove-circle"></span> Delete</a><hr>-->
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deletesched"><span class="glyphicon glyphicon-trash"></span> Delete
          </button>
        <!-- Modal -->
        <div class="modal fade" id="deletesched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" style="color:black;">Delete this event</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="color:black;">
                Are you sure?
              </div>
              <div class="modal-footer">
                <form method="POST" action="includes/delete.php?delete=<?php echo $row['id']; ?>">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-check"></i> Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>

                </form>

              </div>
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

</body>
</html>
