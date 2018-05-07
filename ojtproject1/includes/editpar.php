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


	<div class="editthis">
	<form  action="editpar.php" method="POST">
	<input type="hidden" name="id" value='<?php echo $row[0]; ?>'>
	
	Lastname: <input type="text" name="newLastname" value="<?php echo $row[1]; ?>"><br/>
	
	Firstname: <input type="text" name="newFirstname" value="<?php echo $row[2]; ?>"><br/>
	
	Middle Initial: <input type="text" name="newMi" value="<?php echo $row[3]; ?>"><br/>
	
	Email: <input type="text" name="newEmail" value="<?php echo $row[4]; ?>"></br>
	Contact:<input type="text" name="newContact" value="<?php echo $row[5]; ?>"><br/>
	
	<input type="submit" value="Save"/>
	<input type="submit" formaction="../schedule.php" value="Cancel"/>

	</form>
	</div>




    <script src="css/buttons.js" ></script>



         <!--footer-->  
    <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </div>
        <!--end of footer-->
     
    </body>

</html>


















