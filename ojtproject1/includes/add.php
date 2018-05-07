<?php
	$con = mysqli_connect('localhost', 'root', '', 'sample');
	
	if(!$con)
	{
		echo 'Not Connected to server';
	}
	
	if(!mysqli_select_db($con,'events'))
	{
		echo '';
	}
	$name = $_POST['companyname'];
	$desc = $_POST['companydesc'];
	$venue = $_POST['venue'];
	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];
	$date = $_POST['date'];
	$slot = $_POST['availableslot'];
	
	$sql = "INSERT INTO events (event_name, event_desc, event_venue, time1, time2, event_date, available_slot) VALUES ('$name', '$desc', '$venue', '$time1', '$time2', '$date','$slot')";
	mysqli_query($con,$sql);
	/**
	header("Location: ../schedule.php?=signupsuccess");
	**/
	header("Refresh:0; url=../schedule.php")
?>