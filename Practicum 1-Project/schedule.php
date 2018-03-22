<!DOCTYPE html>
<?php
 include_once 'dbh.inc.php';
?>
<html lang="en">
    <head>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schedule</title>
        <link rel="icon" href="images/slulogo.png">
       
        
        <link rel="stylesheet" type="text/css" href="css/style.css" title="main">
    </head>
    <body class ="color">
<?php
	$sql = "SELECT * FROM mytable";
	$result = mysqli_query($connection, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
           
           echo '<div class ="db">';
           echo $row['id'];
           echo '</div>';
		}
	}
?>	

        <div class="boxhead">
        <div class ="header-container">
         <img src="images/slulogo.png" class="slulogo">
         <input type="submit" name="" value="Log-out">
        </div>

        <nav>
            <ul>
                <li><a href="home.html">HOME</a></li>
                <li><a href="company.html">COMPANY</a></li>
                <li class="selected"><a href="schedule.php">SCHEDULE</a></li>
            </ul>
        </nav>


 <!-- Add Sched -->       
<button id="addsched">Add Schedule</button>
<div id="add-sched" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
        <table>
        <tr>
            <td>Event Name</td>
            <td><input type="text" name="Event_name" value=""></td>
        </tr>
        <tr>
            <td>Event Description</td>
            <td><input type="text" name="Event_Description" value=""></td>
        </tr>
        <tr>
            <td>Venue</td>
            <td><input type="text" name="Venue" value=""></td>
        </tr>
        <tr>
            <td>Time</td>
            <td><input type="text" name="roll_no" value=""></td>
            </td>
        </tr>
        <tr>
        <td>Date</td>
        <td>
     
        </td>
    </tr>
    <tr>
        <input class="save" type="submit" value="save">
        <input class="cancel" type="submit" value="cancel">
    </tr>
    </table>

    </div>
</div>
<!-- View Participants -->
<button id="viewpar">View Participants</button>
<div id="view-par" class="modal1">
    <div class="modal-content">
    <span class="close1">&times;</span>
    <p>View Schedule</p>
    
    <input class="AddPar" type="submit" value="Add ">
    <div id="add-par" class="modalpar1">
    <div class="modal-content">
    <span class="closepar1">&times;</span>
    <p>Add Participants</p>
    </div>
    
    <input class="ViewPar1" type="submit" value="View Participants">
    <input class="DeletePar" type="submit" value="Delete Participants">

    </div>
</div>

<!-- Delete Schedule -->
<button id="delsched">Delete Schedule</button>
<div id="del-sched" class="modal2">
    <div class="modal-content">
    <span class="close2">&times;</span>
    <p>Are you Sure you want to Delete this Schedule</p>
    <input class="YesDel" type="submit" value="Yes">
    <input class="nodelete" type="submit" value="No">

    </div>
</div>





<script src="css/addsched.js"></script>
		 
    </body>

    <footer>
        <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </footer>
</html>