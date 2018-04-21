<!DOCTYPE html>
<?php
 include '../includes/dbh.inc.php';
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SCHEDULE</title>
        <link rel="icon" href="../images/slulogo.png">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css" title="main">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>
    
        <!--header_window-->
        <div class="header-container">
            <img class="scislogo" src="../images/slulogo.png">
            <div id="title-page">SLU iRecruit</div>
            <div id="logout-btn">Logout</div>
        </div>
        <!--end of header_window-->

        <!--navigation-->
        <div class="nav-container">
            <ul>
             <li>
                <a href="../home.php"><i class="fa fa-home"></i>HOME</a>
             </li>
             <li>
                <a href="../company.html"><i class="fa fa-building"></i>COMPANY</a>
             </li>
                 <li class="selected">
                <a href="../schedule.php"><i class="fa fa-calendar"></i>SCHEDULE</a>
             </li>
            </ul>
        </div>
        <!--end of navigation-->

        

        <?php
        
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);


           
           echo '<table class="eventcontent" border="1">'; 
           echo '<tr><td><strong>Event Name:</strong></td><td>'.$row['event_name'].'</td></tr>';
           echo '<tr><td><strong>Event Description:</strong></td><td>'.$row['event_desc'].'</td></tr>';
           echo '<tr><td><strong>Event Venue:</strong></td><td>'.$row['event_venue'].'</td></tr>';
           echo '<tr><td><strong>Event Time:</strong><td>'.$row['time1'].'-';
           echo  $row['time2'].'</td></tr>';
           echo '<tr><td><strong>Date:</strong></td><td>'.$row['event_date'].'</td></tr>';
           echo '<tr><td><strong>Slots Available:</strong></td><td>'.$row['available_slot'].'</td></tr>';
           echo '</table>';

       }
        
        ?>  

       

        <?php
        
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);
        
 


           echo "<a class='parlink' href='viewpar.php?viewpar=$id'>View Participants</a>";

        }

         ?>
<!--
        <table class ="tablebutton" width="600" border="0">
    <tr><td><button id="addsched">Add Schedule</button></td>
    <td><button id="delsched">Delete Schedule</button></td></tr>
    </table>

     <div id="add-sched" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>

    <form method="POST" action="addpar.php" autocomplete="off">
        <table border="0" border="1" >
        <tr><td>Last Name:</td><td><input type="text" name="parlastname"  required></td></tr>
        <tr><td>First Name:</td><td><input type="text" name="parfirstname" required></td></tr>
        <tr><td>Middle:</td><td> <input type="text" name="parmi"  required></td></tr>
        <tr><td>Email:</td><td> <input type="text" name="paremail"  required> </td></tr>
        <tr><td>Contact:</td><td> <input type="text" name="parcontact" required></td></tr>
        </table>
        <button type="submit" name="Submit">Add</button> 
        <button type="submit" name="Cancel" >Cancel</button>
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
         $query = "SELECT * FROM `participants`";
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
-->


    
    <button id="addpar">Add Paticipants</button>
  

    <div id="add-par" class="modal3">
    <div class="modal-content">
    <span class="close3">&times;</span>
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





        
        

         <!--footer-->  
    <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </div>
        <!--end of footer-->
     
    </body>
        <script src="../css/addsched.js" async></script>

</html>