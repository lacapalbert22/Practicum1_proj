<?php
	$con = mysqli_connect('localhost', 'root', '', 'sample');
	
	if(!$con)
	{
		echo 'Not Connected to server';
	}
	
	if(!mysqli_select_db($con,'participants'))
	{
		echo '';
	}
	  if( isset($_GET['addpar']) )
         {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['addpar'];
        $sql = "SELECT * FROM participants WHERE event_fk='$id'";
        $result = mysqli_query($con,$sql);
 
		$lastname = $_POST['parlastname'];
		$firstname = $_POST['parfirstname'];
		$mi = $_POST['parmi'];
		$email = $_POST['paremail'];
		$contact = $_POST['parcontact'];
	  }
	
	
	$sql = "INSERT INTO participants (par_lastname, par_firstname, par_mi, par_email, par_contact) VALUES ('$lastname', '$firstname', '$mi', '$email', '$contact')";
	mysqli_query($con,$sql);

	/**
	header("Location: ../schedule.php?=signupsuccess");
	**/
	header("Refresh:10; url=../includes/viewpar.php")
 
?>