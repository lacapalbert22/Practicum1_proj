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
        <li><a href="../home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="../company.php"><i class="fa fa-building"></i> Company</a></li>
        <li><a href="../schedule.php"><i class="fa fa-calendar"></i> Schedule</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> User<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Profile</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php

        if( isset($_GET['viewpar']) )
         {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['viewpar'];
        $sql = "SELECT * FROM participants WHERE event_fk='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result); 

        echo "<div class='container'>";
        echo "<a href='viewschedule.php?view=$row[event_fk]' class='btn btn-default'>Back</a>";
        echo "<hr>";
        echo "</div>";

        
      }
    
?>



   <div class="container">
   <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Participants</div>



  <!-- Table -->
  <table class="table">
  <th>Last Name</th>
  <th>First Name</th>
  <th>Middle Initial</th>
  <th>Email</th>
  <th>Contact</th>
        
     
       <?php

        if( isset($_GET['viewpar']) )
         {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['viewpar'];
        $sql = "SELECT * FROM participants WHERE event_fk='$id'";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
                 
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           echo '<tr>';
           echo '<td>'.$row['par_lastname'].'</td>';
           echo '<td>'.$row['par_firstname'].'</td>';
           echo '<td>'.$row['par_mi'].'</td>';
           echo '<td>'.$row['par_email'].'</td>';
           echo '<td>'.$row['par_contact'].'</td>';   
           echo "<td><a class='btn btn-primary' href='editpar.php?editpar=$row[par_id]'>Edit</a>   ";
           echo "<a class='btn btn-primary' href='deletepar.php?deletepar=$row[par_id]'>Delete</a></td>";
           echo '</tr>'; 



        }
        }
        }


  


        ?>

      </table>
    </div>
  </div>


    


  
    


</body>
</html>
