<?php
	
	require_once 'includes/dbh.inc.php';
	require 'includes/checklogin.php';
	if(isset($_POST['btnsave']))
	{
		$name = $_POST['name1'];
    $prof = $_POST['profile'];
    $add = $_POST['address'];
    $line = $_POST['landline'];
    $web = $_POST['website'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
    $upload_dir = 'images/company/'; 

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
    }
    else{
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
    }
		if(!isset($errMSG))
		{
      $stmt = "INSERT INTO company( company_name, company_desc, company_logo, company_address, company_landline, company_website) VALUES('$name','$prof', '$userpic', '$add','$line', '$web'); ";
			if(mysqli_query($con,$stmt))
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;company.php");
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
  }
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/slulogo.png">
  <style>
  .textarea{ 
    height: 3vh; 
  }

  </style>
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway');

body{
  font-size: 20px; 
}
li a{
  font-size: 18px;
  font-family: 'Raleway', sans-serif;

}

</style>

<style>
@import url('https://fonts.googleapis.com/css?family=Raleway');
@import url('https://fonts.googleapis.com/css?family=Quicksand');
@import url('https://fonts.googleapis.com/css?family=Lobster+Two');
body{
  font-size: 20px; 
}
li a{
  font-size: 18px;
  font-family: 'Raleway', sans-serif;

}

</style>

<body>

  <nav class="navbar navbar-default" style="background-color: #000040; height: 57px; border-bottom: 6px solid #B8860B; ">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <a href="home.php" class="navbar-left"><img src="images/slulogo.png" style="width:38px; float: left; padding-top: 7px; margin-right: 10px;"></a>
      <a class="navbar-brand" href="home.php" style="font-family: 'Raleway', sans-serif; font-size: 30px; font-weight: bold; color: #f2f2f2; ">iRecruit</a>
    </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php" style="  color: #f2f2f2;"><i class="fa fa-home"></i>&nbspHome</a></li>
        <li><a href="company.php" style="  color: #f2f2f2;"><i class="fa fa-building"></i>&nbspCompany</a></li>
        <li><a href="schedule.php" style="  color: #f2f2f2;"><i class="fa fa-calendar"></i>&nbspSchedule</a></li>
         <li class="dropdown">
          <a href="#" style="  color: #f2f2f2;"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> &nbspUser<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span>&nbspProfile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbspLogout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container-fluid text-center">
<center style="font-size: 45px; font-family: 'Lobster Two', cursive; font-weight: bold;">Add New Company</center>
  
<hr>
</div>

<div class="container-fluid" align="center" style="font-family: 'Raleway';">
  
  <div class="row" >
    <div class=" col-md-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsched" style="background-color: #000040;color: #f2f2f2;">
        <span class="glyphicon glyphicon-plus"></span> Add Company
      </button>
    </div> 

    <div class="col-md-6" style="font-family: 'Raleway';">
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
          <input type="text" name="search_text" id="search_text" size="90" placeholder="Search" class="form-control" />
        </div>
      </div>
    </div>  
    <div class="col-md-4">
      <?php
        if(isset($errMSG)){
          ?>
            <div class="alert alert-danger" style="font-family: 'Raleway';">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
          <?php
        }
        else if(isset($successMSG)){
          ?>
            <div class="alert alert-success" style="font-family: 'Raleway';">
                <strong><span class="glyphicon glpyphicon-info-sign"></span> <?hp echo $successMSG; ?></strong>
            </div>
          <?php
      }
      ?>
    </div>   
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: 'Raleway';">
  <div class="modal-dialog modalg-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Add Company</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Company Name</label>
          <input class="form-control" type="text" name="name1" placeholder="Name" required>
        </div> 
        <div class="form-group col-md-12">
          <label for="exampleInputPassword1">Company Profile</label>
          <textarea type="password" class="form-control" type="text" name="profile" placeholder="Profile" row="5"></textarea>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Company Address</label>
          <input class="form-control" type="text" name="address" placeholder="Address" required>
        </div>
        <div class="form-group">
        <div class="form-row col-md-12">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Landline</label>
            <input class="form-control" type="text" name="landline" placeholder="Landline" >
          </div>
          <div class="form-group col-md-6"style="margin-left: 15px;" >
            <label for="inputPassword4">Website</label>
            <input class="form-control" type="text" name="website" placeholder="Website">
          </div>
          </div>
        </div>
        <div class="form-group">
        <div class="form-row col-md-12">
          <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Company Logo</label>
          <input class="input-group" type="file" name="user_image" accept="image/*" />
          </div>
          <div class="form-group col-md-">
          </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md"  style="width:120px;" name="btnsave"><i class="glyphicon glyphicon-save"></i> Save</button>
        <button type="button" class="btn btn-danger btn-md"  style="width:120px;" name="#" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i> Cancel</button> 
        </form>
        
        
        <hr>
      </div>
    </div>
  </div>
</div>
<hr>

<div class="container" style="font-family: 'Raleway';">
  <div id="result"></div>
</div>
  

   
</body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"includes/getcomp.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>