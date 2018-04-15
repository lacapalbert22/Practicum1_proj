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
        <th>Company Name</th>
        <th>Company Description</th>
        <th>Available Slots</th> 
        <?php
        $sql = "SELECT * FROM events";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

           echo '<tr>';
           echo '<td>'.$row['event_name'].'</td>';
           echo '<td>'.$row['event_desc'].'</td>';
           echo '<td>'.$row['available_slot'].'</td>';
           echo '<td><a href="edit.php"</td>';
           echo '</tr>';
               
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
		 <table class ="tablebutton"width="600" border="0" cellpadding"1" cellspacing="1">
<tr>
<td> 
<!--<form action="addschedule.php"> -->  
<button id="addsched">Add Schedule</button>
<!--</form>-->
</td>
<td>
<button id="viewsched">View Schedule</button>
</td>
<td>
<button id="delsched">Delete Schedule</button>
</td>
</tr>
</table>
<div id="add-sched" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
     <form method="POST" action="includes/submit.inc.php">
        <input type="text" name="companyname" placeholder="CompanyName">
        <br>
        <input type="text" name="companydesc" placeholder="CompanyDescription">
        <br>
        <input type="text" name="availableslot" placeholder="availableslots">
        <br>

        <button type="submit" name="submit">Add</button>
    </form>
</div>
</div>


<div id="view-sched" class="modal1">
    <div class="modal-content">
    <span class="close1">&times;</span>

    <button id="viewpar">View Participants</button>
</div>
</div>

    <div id="view-par" class="modalpar1">
    <div class="modal-content">
    <span class="closepar1">&times;</span>

    </div>
    </div>

<div id="view-sched" class="modal1">
    <div class="modal-content">
    <span class="close1">&times;</span>

    <button id="viewpar">View Participants</button>
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
  



    








    <script src="css/addsched.js" ></script>
         <!--footer-->  
        <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
        </div>
        <!--end of footer-->
     
    </body>

</html>