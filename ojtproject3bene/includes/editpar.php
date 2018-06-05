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
      <a class="navbar-brand" href="../home.php">iSLU</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="../company.php"><i class="fa fa-building"></i> Company</a></li>
        <li><a href="../schedule.php"><i class="fa fa-calendar"></i> Schedule</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> User<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./profile.php"><span class="glyphicon glyphicon-cog"></span> Profile</a></li>
            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <?php
  
  include_once('dbh.inc.php');
 
  if( isset($_GET['editpar']) )
  {
    $con = mysqli_connect('localhost', 'root', '', 'sample');
    $id = $_GET['editpar'];
    $sql = "SELECT * FROM participants WHERE par_id='$id'";
    $res = mysqli_query($con,$sql);
    $row= mysqli_fetch_array($res);
  }
 
  if( isset($_POST['newName']) )
  {
    $con = mysqli_connect('localhost', 'root', '', 'sample');
    $newLastname = $_POST['newLastname'];
    $newFirstname = $_POST['newFirstname'];
    $newMi = $_POST['newMi'];
    $newEmail = $_POST['newEmail'];
    $newContact = $_POST['newContact'];
    


    $id = $_POST['par_id'];
    $sql = "UPDATE participants SET par_lastname='$newLastname', par_firstname='$newFirstname', par_mi='$newMi', par_email='$newEmail', par_contact='$newContact'";
    $res = mysqli_query($con,$sql) or die("Could not update".mysqli_error($con));
    
    echo "<meta http-equiv='refresh' content='0;url=viewpar.php'>";
  }
    

  ?>

  <div class="container">
  <form  action="editpar.php" method="POST">
  <input type="hidden" name="id" value='<?php echo $row[0]; ?>'>
  
  Lastname:<br> 
  <input class="form-control" type="text" name="newLastname" value="<?php echo $row[1]; ?>"><br/>
  
  Firstname:<br> 
  <input class="form-control" type="text" name="newFirstname" value="<?php echo $row[2]; ?>"><br/>
  
  Middle Initial:<br> 
  <input class="form-control" type="text" name="newMi" value="<?php echo $row[3]; ?>"><br/>
  
  Email:<br> 
  <input class="form-control" type="text" name="newEmail" value="<?php echo $row[4]; ?>"></br>
  
  Contact:<br> 
  <input class="form-control" type="text" name="newContact" value="<?php echo $row[5]; ?>"><br/>
  
  
  <input class="btn btn-primary" type="submit" value="Save">
  <a class="btn btn-primary" href="viewpar.php?viewpar=<?php echo $row['event_fk']; ?>">Back</a>
  </form>
  </div>




</body>
</html>
