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
	 
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_POST['time_fk'];
        $id2= $_POST['view'];
        $id3= $_POST['date'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$mi = $_POST['mi'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$courseyear = $_POST['courseyear'];
	
	
	$sql = "INSERT INTO participants (par_lastname, par_firstname, par_mi, par_email, par_contact, courseyear, time_fk) VALUES ('$lastname', '$firstname', '$mi', '$email', '$contact', '$courseyear', '$id')";

	if ($con->query($sql) === TRUE) {
		   	header("Refresh:0; url=viewparticipant.php?par=$id&view=$id2&date=$id3");
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		$con->close();     
?>