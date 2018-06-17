<?php
	$con = mysqli_connect('localhost', 'root', '', 'sample');
	
	$adddate = $_POST['event_fk'];
	$date = $_POST['date'];
	$venue = $_POST['venue'];
	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];

	
	//$sql = "INSERT INTO schedule (sched_time1, sched_time2, sched_venue, sched_date, event_fk) VALUES ('$time1', '$time2', '$venue', '$date','$adddate')";

	$sql = "INSERT INTO date (date, event_fk) VALUES ('$date','$adddate')";
	mysqli_query($con,$sql);
    $last_id = mysqli_insert_id($con);

	$sql = "INSERT INTO time (time1, time2 ,date_fk, venue) VALUES ('$time1', '$time2', '$last_id' , '$venue')";

		if ($con->query($sql) === TRUE) {
		   	header("Refresh:0; url=viewschedule.php?view=$adddate");
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		$con->close();     
?>