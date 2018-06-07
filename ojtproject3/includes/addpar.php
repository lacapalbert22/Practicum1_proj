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
	  if( isset($_POST['addpar']) )
         {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_POST['addpar'];
        $sql = "SELECT * FROM participants WHERE date_fk='$id'";
        $result = mysqli_query($con,$sql);
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$mi = $_POST['mi'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$course = $_POST['course'];
		$year = $_POST['year'];
	
	
	$sql = "INSERT INTO participants (par_lastname, par_firstname, par_mi, par_email, par_contact, course, year, date_fk) VALUES ('$lastname', '$firstname', '$mi', '$email', '$contact', '$course', '$year', '$id')";
	$res = mysqli_query($con,$sql) or die("Could not add".mysqli_error($con));
	header("Refresh:0; url=includes/viewparticipant.php?viewparticipant=$id");
}
?>