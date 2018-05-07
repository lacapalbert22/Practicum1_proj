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
	
	
	$sql = "INSERT INTO participants (par_lastname, par_firstname, par_mi, par_email, par_contact, event_fk) VALUES ('$lastname', '$firstname', '$mi', '$email', '$contact', '$id')";
	$res = mysqli_query($con,$sql) or die("Could not add".mysqli_error($con));

	/**
	header("Location: ../schedule.php?=signupsuccess");
	**/
	header("Refresh:0; url=../includes/viewpar.php?viewpar=$id");
}
?>