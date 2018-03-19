<?php

$host='localhost:3308';
$user='root';
$pass='';
$db='myschedule';

$con=mysqli_connect($host,$user,$pass,$db);
if($con)
	echo 'connected successfully to database';

if ($mysqli ->connect_error){
	printf("connect failed: %s\n", $mysqli->connect_error);
	exit();
}
$sql="insert into mytable (id,first_name,last_name,course,year) values ('214205','john','lodi','asdas','1'";
$query=mysqli_query($con,$sql);
if(query)
	echo 'data inserted successfully';
?>