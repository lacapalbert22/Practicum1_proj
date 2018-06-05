<?php
	$con = mysqli_connect('localhost', 'root', '', 'sample');
	
	$adddate = $_POST['event_fk'];
	$date = $_POST['date'];
	$venue = $_POST['venue'];
	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];

	
	$sql = "INSERT INTO schedule (sched_time1, sched_time2, sched_venue, sched_date, event_fk) VALUES ('$time1', '$time2', '$venue', '$date','$adddate')";
		if ($con->query($sql) === TRUE) {
		   	header("Refresh:2; url=viewschedule.php?view=$adddate");
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		$con->close();     
?>