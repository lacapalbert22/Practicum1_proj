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
<body>
  <style type="text/css">body{ font-family:'Tajawal'; font-size: 20px;}
  li a{font-size:18px;} 
   </style>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="home.php" class="navbar-left"><img src="images/slulogo.png" style="width:30px; float: left; padding-top: 10px;margin-right:5px;"></a>
      <a class="navbar-brand" href="home.php">iRecruit</a>
    </div>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="home.php"><i class="fa fa-home"></i>&nbspHome</a></li>
        <li><a href="company.php"><i class="fa fa-building"></i>&nbspCompany</a></li>
        <li><a href="schedule.php"><i class="fa fa-calendar"></i>&nbspSchedule</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbspUser<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span> Profile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>


    </div>
  </div>
</nav>



<div class="container-fluid text-center">
<h1>Add New Company</h1>
  
<hr>
</div>

<div class="container-fluid">
  <div class="row" >
    <div class=" col-md-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsched">
        <span class="glyphicon glyphicon-plus"></span> Add Company
      </button>
    </div>  
    <div class="col-md-6" >
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
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
          <?php
        }
        else if(isset($successMSG)){
          ?>
            <div class="alert alert-success">
                <strong><span class="glyphicon glpyphicon-info-sign"></span> <?hp echo $successMSG; ?></strong>
            </div>
          <?php
      }
      ?>
    </div>   
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="container">
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