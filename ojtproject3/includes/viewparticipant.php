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
  <h1><center><b>View Participant</b></center></h1><br>
</div>
<?php
  $id=$_GET['par'];
  $id2=$_GET['view'];
  $id3=$_GET['date'];
?>


<div class="container" style="font-family: 'Raleway';">
<a href="viewtime.php?time=<?php echo $id3; ?>&amp;view=<?php echo $id2; ?>" class="btn btn-default" style="background-color: #000040;color: #f2f2f2;"><span class="glyphicon glyphicon-arrow-left" ></span> Back</a>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#adddate" style="background-color: #000040;color: #f2f2f2;"><i class="glyphicon glyphicon-plus"></i> Add Participants</button>
</div>

<div id="adddate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Participant</h4>
      </div>
      <div class="modal-body">
        <form action="addpar.php" method="post">
           <input type="hidden" name="time_fk" value="<?php  echo $id; ?>">
           <input type="hidden" name="view" value="<?php  echo $id2; ?>">
           <input type="hidden" name="date" value="<?php  echo $id3; ?>">

          <h4>First name:</h4><input class="form-control" type="text" name="firstname" autocomplete="off">
          <h4>Last name:</h4><input class="form-control" type="text" name="lastname" autocomplete="off">
          <h4>Middle Initial:</h4><input class="form-control" type="text" name="mi" autocomplete="off">
          <h4>Email:</h4><input class="form-control" type="text" name="email" autocomplete="off">
          <h4>Course and Year:</h4><input class="form-control" type="text" name="courseyear" autocomplete="off">
          <h4>Contact:</h4><input class="form-control" type="text" name="contact" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
      </div>
        </form>
    </div>

  </div>
</div><br>

<div class="container">
  <table class="table table-bordered">
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Contact</th>
    



     <?php
        
        
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id=$_GET['par'];
        $id2=$_GET['view'];
        $id3=$_GET['date'];
        $sql = "SELECT * from participants WHERE time_fk='$id'";
        $res = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($res);

         if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($res)) {

           echo '<tr>'; 
           echo '<td>'.$row['par_lastname'].',';
           echo  $row['par_firstname'].'';
           echo ' '.$row['par_mi'].'</td>';
           echo '<td>'.$row['par_email'].'</td>';
           echo '<td>'.$row['courseyear'].'</td>';
           echo '<td>'.$row['par_contact'].'</td>';
           ?>
           <td><a href="" class='btn btn-primary' style='background-color: #000040;color: #f2f2f2;'><i class="glyphicon glyphicon-comment"></i> Email</a>
           <a href="deletepar.php?deletepar=<?php echo $row['par_id']; ?>&amp;par=<?php echo $id; ?>&amp;view=<?php echo $id2; ?>&amp;date=<?php echo $id3; ?>" class='btn btn-primary' style='background-color: #000040;color: #f2f2f2;' onclick="return confirm('Are you sure you want to delete this participant?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#movePar" value="<?php echo $row['id']; ?>"style='background-color: #000040;color: #f2f2f2;'>
       <i class="glyphicon glyphicon-th-list"></i> Move Participant
      </button></td></tr>

       <div class="modal fade" id="movePar">
      <div class="modal-dialog">
      <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-title">Move Participants</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="movepar.php" method="POST">
          <input type="hidden" name="lastname" value="<?php  echo $row['par_lastname']; ?>">
          <input type="hidden" name="firstname" value="<?php  echo $row['par_firstname']; ?>">
          <input type="hidden" name="mi" value="<?php  echo $row['par_mi']; ?>">
          <input type="hidden" name="email" value="<?php  echo $row['par_email']; ?>">
          <input type="hidden" name="courseyear" value="<?php  echo $row['courseyear']; ?>">
          <input type="hidden" name="contact" value="<?php  echo $row['par_contact']; ?>">
         
      Choose a time:<br>
        <div class="form-group">
         <select class="form-control" name="timemove">
      <?php
             $id=$_GET['par'];
             $id2=$_GET['view'];
             $id3=$_GET['date'];
             $sql = "select * from time where date_fk='$id3'";
            $result = mysqli_query($con,$sql);
            $resultCheck = mysqli_num_rows($result);

        /*$row = mysqli_fetch_array($result);*/
        
            if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            extract($row);

              echo '<option value="'.$row['time_id'].'">'.$row['time1'].'-'.$row['time2'].'</option>';

                }
              }
            ?>
          </select>
          </div>

      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-check"></i> Move</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
      </div>

    </form>

    </div>
  </div>
</div>
          

  
  <?php
          

        
      }
    }

        ?>
     


</table>
</div>

       


</body>
</html>
