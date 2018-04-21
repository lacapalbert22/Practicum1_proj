<!DOCTYPE html>
<?php
 include 'includes/dbh.inc.php';
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SCHEDULE</title>
        <link rel="icon" href="images/slulogo.png">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css" title="main">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>


        <table class ="db" width="600" border="1" cellpadding"1" cellspacing="1">
        <th>Event Title</th>
        <th>Event Description</th>
        <th>Venue</th>
        <th>Time</th>
        <th>Date</th>
        <th>Available Slots</th>
        
        <?php
        
        $sql = "SELECT * FROM events";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
        /*$row = mysqli_fetch_array($result);*/
        
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           echo '<tr>';
           echo '<td>'.$row['event_name'].'</td>';
           echo '<td>'.$row['event_desc'].'</td>';
           echo '<td>'.$row['event_venue'].'</td>';
           echo '<td>'.$row['time1'].'';
           echo '-'.$row['time2'].'</td>';
           echo '<td>'.$row['event_date'].'</td>';
           echo '<td>'.$row['available_slot'].'</td>';
           echo '</tr>'; 
           echo "<tr><td><a href='includes/edit.php?edit=$row[id]'>Edit</a></td>";
           echo "<td><a href='includes/viewschedule.php?view=$row[id]'>View Schedule</a></td></tr>";

     
       }
    }

   

   
        ?>  

        
       
        </table>

        <!--header_window-->
        <div class="header-container">
            <img class="scislogo" src="images/slulogo.png">
            <div id="title-page">SLU iRecruit</div>
            <div id="logout-btn">Logout</div>
        </div>
        <!--end of header_window-->

        <!--navigation-->
        <div class="nav-container">
            <ul>
             <li>
                <a href="home.php"><i class="fa fa-home"></i>HOME</a>
             </li>
             <li>
                <a href="company.html"><i class="fa fa-building"></i>COMPANY</a>
             </li>
                 <li class="selected">
                <a href="schedule.php"><i class="fa fa-calendar"></i>SCHEDULE</a>
             </li>
            </ul>
        </div>
        <!--end of navigation-->

         <!-- Add Sched -->   

		 
	<table class ="tablebutton" width="600" border="0">
    <tr><td><button id="addsched">Add Schedule</button></td>
    <td><button id="delsched">Delete Schedule</button></td></tr>
    </table>

  
    <div id="add-sched" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
        <form method="POST" action="includes/add.php" autocomplete="off">
        <table border="0" border="1" cellpadding"1" cellspacing="1">
        <tr><td>Event Name:</td>
        <td><input type="text" name="companyname"  required></td>
        <br>
        </tr>
        <tr><td>Event Description:</td><td><input type="text" name="companydesc" required></td><br></tr>
        <tr><td>Venue:</td><td> <input type="text" name="venue"  required></td><br></tr>
        <tr><td>Time:</td><td> <input type="time" name="time1"  required> -
        <input type="time" name="time2" placeholder="Time" required min="7:00 AM" max="4:00 PM"></td><br></tr>
        <tr><td>Date:</td><td> <input type="date" name="date" required></td><br></tr>
        <tr><td>Available Slots:</td><td> <input type="text" name="availableslot"  required></td><br></tr>
        </table>
        <button type="submit" name="Submit">Add</button> 
        <button type="submit" name="Cancel" formaction="schedule.php">Cancel</button> 

    </form>
    </div>
    </div>



    <div id="del-sched" class="modal2">
    <div class="modal-content">
    <span class="close2">&times;</span>

    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "sample";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT * FROM `events`";
    $result = mysqli_query($connect, $query);
    ?>  
     
     <form action="includes/delete.php" method="post">
          <select name="deletedata">

            <?php while($row1 = mysqli_fetch_array($result)):;?>
            
            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
            
            <?php endwhile;?>

            </select>
        <input type="submit" name="delete" value="Clear Data">
     </form>
    </div>
    </div>


    <script src="css/addsched.js" async></script>


         <!--footer-->  
    <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </div>
        <!--end of footer-->
     
    </body>
    
  
</html>