<?php
	$con = mysqli_connect('localhost', 'root', '', 'sample');
	

	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$mi = $_POST['mi'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$courseyear = $_POST['courseyear'];
	
	$sql = "INSERT INTO  (event_name, event_desc, event_venue, time1, time2, event_date, available_slot, company_fk) VALUES ('$name', '$desc', '$venue', '$time1', '$time2', '$date','$slot','$company')";
	mysqli_query($con,$sql);
	$last_id = mysqli_insert_id($con);
	
	$sql = "INSERT INTO date (date, event_fk) VALUES ('$date','$last_id')";
	mysqli_query($con,$sql);
	$last_id2 = mysqli_insert_id($con);

	$sql = "INSERT INTO time (time1, time2, venue, date_fk) VALUES ('$time1', '$time2', '$venue' , '$last_id2')";
	mysqli_query($con,$sql);
		
    header("Refresh:5; url=../schedule.php");
	
	//$sql = "INSERT INTO schedule (sched_venue, sched_date, sched_time1, sched_time2, event_fk) VALUES ('$venue','$date', '$time1', '$time2', '$last_id')";
	
?>