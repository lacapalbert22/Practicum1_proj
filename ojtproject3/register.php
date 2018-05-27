<?php
	error_reporting( ~E_NOTICE );

	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'sample';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$query =  $DB_con->prepare('select * from user where user_name=:user');
		$query->bindParam(':user',$username);
		$query->execute();
		if($query->fetchColumn() > 0){
			$errMSG = "USERNAME ALREADY TAKEN";
		}else{
			$first = $_POST['full_name'];
			$password = $_POST['password'];
			$hashedPwd = sha1($password);
			$email = $_POST['email'];

			$successMSG = 'SO FAR SO GOOD';

			$imgFile = $_FILES['user_image']['name'];
			$tmp_dir = $_FILES['user_image']['tmp_name'];
			$imgSize = $_FILES['user_image']['size'];
			$upload_dir = 'images/';
		
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions)){			
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}

			$stmt = $DB_con->prepare('INSERT INTO `user`(`user_name`, `user_password`, `user_fullname`, `user_image`) VALUES (:username, :pass, :uname, :uimage)');
            $stmt->bindParam(':username',$username);
			$stmt->bindParam(':pass',$hashedPwd);
			$stmt->bindParam(':uname',$first);
			$stmt->bindParam(':uimage',$username);

			if($stmt->execute())
			{
				header("refresh:0.5;index.php"); 
			}


		}


	}
?>

<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- banner -->
   <style>
      @import url('https://fonts.googleapis.com/css?family=Courgette');
      @import url('https://fonts.googleapis.com/css?family=Montserrat');
	  .w3layouts_main_grid{
		  background: rgba(0,0,.0,0.7);
		  border-radius: 10px;
	  }
    </style>
	
	<div class="center-container">
		<div class="main" >
			
				<div class="w3layouts_main_grid">
					<h1 class="w3layouts_head" style="font-family: 'Courgette', cursive; font-size: 47px; color:white">Register </h1>

					<form action="#" method="post" class="w3_form_post" >
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Username </label>
								<input type="text" name="username" required="" style="width: 95%;">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Password </label>
								<input type="text" name="password" required="" style="width: 95%;">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>FULL Name </label>
								<input type="text" name="full_name"  style="width: 95%;">
							</span>
						</div>
						<!--<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Family Name </label>
								<input type="text" name="family_name"  style="width: 95%;">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Middle Initial </label>
								<input type="text" name="middle_initial"  style="width: 95%;">
							</span>
						</div>
						
						
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Address </label>
								<input type="text" name="address" style="width: 95%;">
							</span>
						</div>
						
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Email </label>
								<input type="email" name="email"  style="width: 95%;">
							</span>
						</div>
						
					<div class="content-w3ls">
						<div class="form-w3ls">
							<div class="content-wthree2">
								<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<label>Gender</label>
										<ul>
											<li>
												<input type="radio" id="a-option" name="gender" value="Male">
												<label for="a-option">Male</label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="b-option" name="gender" value="Female">
												<label for="b-option">Female</label>
												<div class="check"><div class="inside"></div></div>
											</li>
										</ul>
									</div>	
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class="clear"></div>
					</div>

					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">
								<label>Birthdate </label>
								<div class="agileits_w3layouts_main_gridl">
									<input class="date" id="datepicker" name="birthdate" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
								</div>
									<div class="clear"> </div>
							</span>
					</div>
					-->
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label for="exampleInputPassword1">Profile Picture</label>
							<input class="input-group" type="file" name="user_image" accept="image/*" />
						</span>
					</div>
					
					
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit" name="register">
						</div>
					</div>
				</form>
			</div>
		<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
							$( "#datepicker" ).datepicker();
						});
					</script>
		<!-- //Calendar -->
			<div class="w3layouts_copy_right">
				<div class="container">
					<p></p>
				</div>
			</div>
		</div>
	</div>
<!-- //footer -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>