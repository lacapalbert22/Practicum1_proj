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
	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];
	$id = $_GET['id'];
	$id2 = $_GET['view'];
	
	
	$sql ="INSERT INTO time (time1, time2, venue, date_fk) VALUES ('$time1', '$time2', '$venue', '$id')";
	
	if ($con->query($sql) === TRUE) {
		   	header("Refresh:0; url=viewtime.php?time=$id&view=$id2");
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		$con->close();     
?>