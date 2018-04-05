<?php


	$con = mysqli_connect('localhost', 'root', '', 'sample');
	
	if(!$con)
	{
		echo 'Not Connected to server';
	}
	
	if(!mysqli_select_db($con,'events'))
	{
		echo 'Database not selected';
	}
	
	$name = $_POST['companyname'];
	$desc = $_POST['companydesc'];
	$slot = $_POST['availableslot'];
	
	$sql = "INSERT INTO events (event_name, event_desc, available_slot) VALUES ('$name', '$desc', '$slot')";
	
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		echo 'Inserted';
	}
	/**
	header("Location: schedule.php?=signupsuccess");
		**/
	header("Refresh:2; url=schedule.php")

	?>