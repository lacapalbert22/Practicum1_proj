<?php
	$con = mysqli_connect('localhost', 'root', '', 'sample');
	
	if(!$con)
	{
		echo 'Not Connected to server';
	}
	
	if(!mysqli_select_db($con,'schedule'))
	{
		echo '';
	}

	$venue = $_POST['venue'];
	$date = $_POST['date'];
	$id = $_POST['id'];
	
	
	$sql = "INSERT INTO schedule (sched_venue, sched_date, company_fk) VALUES ('$venue', '$date', '$id') where event_fk='$id'" ;
	mysqli_query($con,$sql);

	header("Refresh:0; url=../viewtime.php?time=$id")
?>