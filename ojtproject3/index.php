<?php
    session_start();
    if(isset($_POST['submit'])){
        $connection = new mysqli("localhost","root","","sample");

        $username = $connection->real_escape_string($_POST["username"]);
        $password = sha1($connection->real_escape_string($_POST["password"]));
        echo $password;
        $data = $connection->query("select user_name, user_password from user where user_name='$username' and user_password='$password'; ");

        if($data->num_rows > 0){
            $sql = $connection->query("select * from user where user_name='$username' and user_password='$password';");
            $row = $sql->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: home.php");
            exit();
        }else{
            header("Location: login.php");
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="icon" href="images/slulogo.png">
        <link rel="stylesheet" type="text/css" href="css/login.css" title="main">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
    	
		<div class="bg">
			<div class="loginbox">
			<img src="images/slulogo.png" class="user">
				<h1>Login Here</h1>
				<form  method="POST" enctype="multipart/form-data" class="form-horizontal">
				<p><i class="fa fa-user-circle-o"></i>Username</p>
				<input type="text" name="username" class="fstyle" placeholder="enter username">
				<p><i class="fa fa-lock"></i>Password</p>
				<input type="password" name="password" class="fstyle1" placeholder="enter password">
					<input type="submit" name="submit">
				</form>
			</div>
		</div>

	<!--footer-->	
	<div id="footer">
        <p>Copyright <a href="signup.php" style="text-decoration: none; color: white;">&copy;</a> Saint Louis University 2018 All Rights Reserved.</p>
    </div>
    <!--end of footer-->
 			
    </body>
</html>