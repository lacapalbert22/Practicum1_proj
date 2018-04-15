<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SCHEDULE</title>
        <link rel="icon" href="images/slulogo.png">
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
	include_once('dbh.inc.php');
 
	if( isset($_GET['edit']) )
	{
		$con = mysqli_connect('localhost', 'root', '', 'sample');
		$id = $_GET['edit'];
		$sql = "SELECT * FROM events WHERE id='$id'";
		$res = mysqli_query($con,$sql);
		$row= mysqli_fetch_array($res);
	}
 
	if( isset($_POST['newName']) )
	{
		$con = mysqli_connect('localhost', 'root', '', 'sample');
		$newName = $_POST['newName'];
		$newDesc = $_POST['newDesc'];
		$newVenue = $_POST['newVenue'];
		$newTime1 = $_POST['newTime1'];
		$newTime2 = $_POST['newTime2'];
		$newSlots = $_POST['newSlots'];


		$id  = $_POST['id'];
		$sql  = "UPDATE events SET event_name='$newName', event_desc='$newDesc', event_Venue='$newVenue', time1='$newTime1', time2='$newTime2', available_slot='$newSlots' WHERE id='$id'";
		$res = mysqli_query($con,$sql) or die("Could not update".mysqli_error($con));
		echo "<meta http-equiv='refresh' content='0;url=../schedule.php'>";
	}
 		

?>
	<div class="editthis">
	<form  action="edit.php" method="POST">
	
	<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
	
	Event Name: <input type="text" name="newName" value="<?php echo $row[1];?>"><br/>
	
	Event Description: <input type="text" name="newDesc" value="<?php echo $row[2];?>"><br/>
	
	Venue: <input type="text" name="newVenue" value="<?php echo $row[3];?>"><br/>
	
	Time: <input type="time" name="newTime1" value="<?php echo $row[4];?>"> - <input type="time" name="newTime2" value="<?php echo $row[6];?>"><br/>
	
	Date:<input type="Date" name="newDate" value="<?php echo $row[7];?>"><br/>
	
	Available Slots: <input type="text" name="newSlots" value="<?php echo $row[5];?>"><br/>
	<input type="submit" value="Save"/>
	<input type="submit" formaction="../schedule.php" value="Cancel"/>

	</form>
	</div>



		 
		 
  


    <script src="css/addsched.js" ></script>



         <!--footer-->  
    <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </div>
        <!--end of footer-->
     
    </body>

</html>


















