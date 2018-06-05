<<<<<<< HEAD
<?php
	require 'includes/checklogin.php';
  $connection = new mysqli("localhost","root","","sample");

	if(isset($_GET['id'])){
    $id = $connection->real_escape_string($_GET["id"]);
    $sql = $connection->query("select * from company where company_id=$id");
    $row = $sql->fetch_assoc();

    if(isset($_GET['id']) && isset($_GET['delete_id']))
	  {
      $sql_delete_cc = $connection->query("DELETE FROM `company_contact` WHERE company_id = $id;");
      $sql_delete_c = $connection->query("DELETE FROM `company` WHERE company_id=$id");
      $sql_delete_c = $connection->query("DELETE FROM `contact_person` WHERE contact_id  != (select contact_id from company_contact);");
		  header("Location: company.php");
    }
    
    if(isset($_POST['btnsave']))
	  {
      $first = $connection->real_escape_string($_POST['fname']);
      $middle = $connection->real_escape_string($_POST['mi']);
      $last = $connection->real_escape_string($_POST['lname']);
      $add = $connection->real_escape_string($_POST['add']);
      $email = $connection->real_escape_string($_POST['email']);
      $mobile = $connection->real_escape_string($_POST['mobile']);

      if(!isset($errMSG))
      {
        $stmt = "INSERT INTO contact_person( first_name, middle_initial, last_name, address, email, contact_num) VALUES ('$first','$middle', '$last', '$add', '$email', '$mobile'); ";
        if(mysqli_query($connection,$stmt))
        {
          $sql2 = $connection->query("select contact_id from contact_person where first_name = '$first' and middle_initial = '$middle'
            and last_name = '$last' and address = '$add' and email = '$email' and contact_num = '$mobile'");
          $row3 = $sql2->fetch_assoc();
          $compid = $row3['contact_id'];
          echo $compid;
         $stmt2 = "INSERT INTO company_contact (contact_id, company_id) VALUES ($compid,$id)";
          if(mysqli_query($connection, $stmt2)){
            $successMSG = "new record succesfully inserted ...";
            header("refresh:0;viewprofile.php?id=$id");
          }
        }
        else
        {
          echo "error while inserting....";
        }
      }
    }

    if(isset($_POST['update_company']))
    {
      $name = $connection->real_escape_string($_POST['name2']);
      $prof = $connection->real_escape_string($_POST['profile2']);
      $add = $connection->real_escape_string($_POST['address2']);
      $line = $connection->real_escape_string($_POST['landline2']);
      $web = $connection->real_escape_string($_POST['website2']);
            
      $imgFile = $_FILES['user_image2']['name'];
      $tmp_dir = $_FILES['user_image2']['tmp_name'];
      $imgSize = $_FILES['user_image2']['size'];

      if($imgFile)
      {
        $upload_dir = 'images/company/';
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $userpic = rand(1000,1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions))
        {			
          if($imgSize < 5000000)
          {
            //unlink($upload_dir.$edit_row['userPic']);
            move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          }
          else
          {
            echo  "Sorry, your file is too large it should be less then 5MB";
          }
        }
        else
        {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
        }	
      }
      else
      {
        $userpic = $connection->real_escape_string($row['company_logo']);
      }	
      if(!isset($errMSG))
      {
        $stmt3 = "UPDATE company SET company_name='$name', company_desc='$prof', company_logo='$userpic', company_address='$add', company_landline='$line', company_website='$web'
        WHERE company_id=$id";
        if(mysqli_query($connection, $stmt3)){
        header("refresh:0;viewprofile.php?id=$id");
        }
      
      }			
    }
  }

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="icon" href="images/slulogo.png">
  <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
</head>

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
.container{
  color: white;
}
</style>

<body>

  <nav class="navbar navbar-default" style="background-color: #000040; height: 57px; border-bottom: 6px solid #B8860B; ">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" >
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

  <div class="container jumbotron" style="border-radius: 10px; background-color: rgba(0,0,64,0.9); border: 6px solid #B8860B">
  <div class="float-left">
  <a href='company.php' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span> Back</a>
  </div>
  <h3 class="text-center"><b style="font-size: 30px;"><?php echo '<h1><b>'.$row['company_name'].'</b> </h1>';?></b></h3>
  <hr>

  

  <div class="container">
    <div class="row">
      <div class="col-md-5">
      <?php
        echo '<img src="images/company/'.$row['company_logo'].'" alt="" style="max-height: 200px; max-width: 400px;min-height: 200px; min-width: 400px;
         border: 1px solid black; border-radius: 10px;  background-color: white;">';
      ?>
      </div>
      <div class="col-md-7">
        <?php
          echo '<div style="text-align: left;"><h4>'.$row['company_desc'].'</h4></div>';
        ?>
      </div>
    </div>
  </div>



  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-md-12">
        <?php
          echo '<div style="text-align: left;"><h4 class="text-justify">Address:<span style="margin: 0 10px 0 10px;"> '.$row['company_address'].'</h4></div>';
          echo '<div style="text-align: left;"><h4 class="text-justify">Website :<span style="margin: 0 10px 0 10px;"> '.$row['company_website'].'</h4></div>';
          echo '<div style="text-align: left;"><h4 class="text-justify">Landline:<span style="margin: 0 10px 0 10px;"> '.$row['company_landline'].'</h4></div>';
          echo '<div class="row">';
        ?>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                   <div class="row col-md-12">
                      <?php
                        $query = $connection->query("select first_name, middle_initial, last_name, contact_num, email
                          from contact_person
                           WHERE
                          contact_id = any(select company_contact.contact_id from company_contact where company_contact.company_id = $id )");
                          echo '<table class="table table-dark" style="color: white;">
                            <thead class="thead-dark"">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Contact Number</th>
                              <th scope="col">Email</th>
                            </tr>
                          </thead>
                          <tbody>
                        ';
                           $loop = 1;
                           while ($row = $query->fetch_assoc()) { 
                            echo '<tr>
                                    <th scope="row">'.$loop.'</th>
                                    <td>'.$row['first_name'].' '.$row['middle_initial'].' '.$row['last_name'].'</td>
                                    <td>'.$row['contact_num'].'</td>
                                    <td>'.$row['email'].'</td>
                                  </tr>
                            ';
                            $loop = $loop + 1;
                            }
                        echo '</tbody>
                        </table>';
                      ?>
                   </div>
            </div>
        </div>
    </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
  
   <div class="container" style="text-align: center;">
    <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#editcomp"><span class="glyphicon glyphicon-edit"></span> Edit Company</button>
    <button class="btn btn-danger btn-lg"><a style="text-decoration: none;color: white;"
    <?php
      echo 'href="?id='.$id.'&amp;delete_id='.$id.'"';
    ?>
      title="click for delete" onclick="return confirm('are you sure you want to delete company ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete Company</a></button>
      <?php
            echo '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addcontact"><span class="glyphicon glyphicon-user"></span> Add Contact</button>';
            $sql2 = $connection->query('select first_name, middle_initial, last_name, contact_num from contact_person inner JOIN company_contact on contact_person.id = company_contact.contact_id where company_contact.company_id = "'.$id.'"');
      ?>
   </div>

  <div class="modal fade text-left" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalg-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Add Contact Person</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">First Name</label>
          <input class="form-control" type="text" name="fname" placeholder="First Name" required>
        </div> 
        <div class="form-group col-md-12">
          <label for="exampleInputPassword1">Middle Initial</label>
          <input type="text" class="form-control" type="text" name="mi" placeholder="Middle Initial" row="5">
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Last Name</label>
          <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Address</label>
          <input class="form-control" type="text" name="add" placeholder="Address" required>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Email</label>
          <input class="form-control" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Mobile Number</label>
          <input class="form-control" type="text" name="mobile" placeholder="Mobile Number" required>
        </div>
          <button type="submit" class="btn btn-primary btn-md"  style="width:120px;" name="btnsave"><i class="glyphicon glyphicon-save"></i> Save</button> 
          <button type="button" class="btn btn-danger btn-md"  style="width:120px;" name="#" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i> Cancel</button> 
        </form>

        <hr>
      </div>
    </div>
  </div>
</div>

    <?php

      $sql_get_comp = $connection->query("select * from company where company_id=$id");
      $row_get_comp = $sql_get_comp->fetch_assoc();

    ?>

<div class="modal fade text-left" id="editcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalg-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Edit Company</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Company Name</label>
          <input class="form-control" type="text" name="name2" value="<?php echo $row_get_comp['company_name']; ?>" required>
        </div> 
        <div class="form-group col-md-12">
          <label for="exampleInputPassword1">Company Profile</label>
          <textarea type="password" class="form-control" type="text" name="profile2" rows="6" cols="50"><?php echo $row_get_comp['company_desc']; ?></textarea>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Company Address</label>
          <input class="form-control" type="text" name="address2" value="<?php echo $row_get_comp['company_address']; ?>" required>
        </div>
        <div class="form-group">
        <div class="form-row col-md-12">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Landline</label>
            <input class="form-control" type="text" name="landline2" value="<?php echo $row_get_comp['company_landline']; ?>" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Website</label>
            <input class="form-control" type="text" name="website2" value="<?php echo $row_get_comp['company_website'];?>">
          </div>
          </div>
        </div>
        <div class="form-group">
        <div class="form-row col-md-12">
          <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Company Logo</label>
          <input class="input-group" type="file" name="user_image2" accept="image/*"  />
          </div>
          <div class="form-group col-md-">
          </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md"  style="width:120px;" name="update_company"><i class="glyphicon glyphicon-save"></i> Save</button>
        <button type="button" class="btn btn-danger btn-md"  style="width:120px;" name="#" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i> Cancel</button> 
        </form>
        <hr>
      </div>
    </div>
  </div>
</div>

</body>
</html>
=======
<?php
	require 'includes/checklogin.php';
  $connection = new mysqli("localhost","root","","sample");

	if(isset($_GET['id'])){
    $id = $connection->real_escape_string($_GET["id"]);
    $sql = $connection->query("select * from company where company_id=$id");
    $row = $sql->fetch_assoc();

    if(isset($_GET['id']) && isset($_GET['delete_id']))
	  {
      $sql_delete_cc = $connection->query("DELETE FROM `company_contact` WHERE company_id = $id;");
      $sql_delete_c = $connection->query("DELETE FROM `company` WHERE company_id=$id");
      $sql_delete_c = $connection->query("DELETE FROM `contact_person` WHERE contact_id  != (select contact_id from company_contact);");
		  header("Location: company.php");
    }
    
    if(isset($_POST['btnsave']))
	  {
      $first = $connection->real_escape_string($_POST['fname']);
      $middle = $connection->real_escape_string($_POST['mi']);
      $last = $connection->real_escape_string($_POST['lname']);
      $add = $connection->real_escape_string($_POST['add']);
      $email = $connection->real_escape_string($_POST['email']);
      $mobile = $connection->real_escape_string($_POST['mobile']);

      if(!isset($errMSG))
      {
        $stmt = "INSERT INTO contact_person( first_name, middle_initial, last_name, address, email, contact_num) VALUES ('$first','$middle', '$last', '$add', '$email', '$mobile'); ";
        if(mysqli_query($connection,$stmt))
        {
          $sql2 = $connection->query("select contact_id from contact_person where first_name = '$first' and middle_initial = '$middle'
            and last_name = '$last' and address = '$add' and email = '$email' and contact_num = '$mobile'");
          $row3 = $sql2->fetch_assoc();
          $compid = $row3['contact_id'];
          echo $compid;
         $stmt2 = "INSERT INTO company_contact (contact_id, company_id) VALUES ($compid,$id)";
          if(mysqli_query($connection, $stmt2)){
            $successMSG = "new record succesfully inserted ...";
            header("refresh:0;viewprofile.php?id=$id");
          }
        }
        else
        {
          echo "error while inserting....";
        }
      }
    }

    if(isset($_POST['update_company']))
    {
      $name = $connection->real_escape_string($_POST['name2']);
      $prof = $connection->real_escape_string($_POST['profile2']);
      $add = $connection->real_escape_string($_POST['address2']);
      $line = $connection->real_escape_string($_POST['landline2']);
      $web = $connection->real_escape_string($_POST['website2']);
            
      $imgFile = $_FILES['user_image2']['name'];
      $tmp_dir = $_FILES['user_image2']['tmp_name'];
      $imgSize = $_FILES['user_image2']['size'];

      if($imgFile)
      {
        $upload_dir = 'images/company/';
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $userpic = rand(1000,1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions))
        {			
          if($imgSize < 5000000)
          {
            //unlink($upload_dir.$edit_row['userPic']);
            move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          }
          else
          {
            echo  "Sorry, your file is too large it should be less then 5MB";
          }
        }
        else
        {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
        }	
      }
      else
      {
        $userpic = $connection->real_escape_string($row['company_logo']);
      }	
      if(!isset($errMSG))
      {
        $stmt3 = "UPDATE company SET company_name='$name', company_desc='$prof', company_logo='$userpic', company_address='$add', company_landline='$line', company_website='$web'
        WHERE company_id=$id";
        if(mysqli_query($connection, $stmt3)){
        header("refresh:0;viewprofile.php?id=$id");
        }
      
      }			
    }
  }

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/slulogo.png">
  <style>
    .jumbotron{
      border-radius: 25px;
    }

  </style>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">iSLU</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php"><i class="fa fa-home"></i>&nbspHome</a></li>
        <li><a href="company.php"><i class="fa fa-building"></i>&nbspCompany</a></li>
        <li><a href="schedule.php"><i class="fa fa-calendar"></i>&nbspSchedule</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbspUser<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="settings.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>


    </div>
  </div>
</nav>

  <div class="container jumbotron">
  <h3 class="text-center"><b style="font-size: 30px;">Company Profile</b></h3>
  <div class="float-left">
  <a href='company.php' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span> Back</a>
  </div>
  <hr>

  

  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <?php
        echo '<img src="images/company/'.$row['company_logo'].'" alt="" style="max-height: 200px; max-width: 400px;min-height: 200px; min-width: 400px;
         border: 1px solid black; border-radius: 25px;">';
      ?>
      </div>
      <div class="col-md-6">
        <?php
          echo '<h2><b>'.$row['company_name'].'</b> </h2>';
          echo '<h4 style="text-align: left;">'.$row['company_address'].' </h4>';
        ?>
      </div>
    </div>
  </div>



  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <?php
          echo '<div style="text-align: left;"><h4>'.$row['company_desc'].'</h4></div><hr>';
          echo '<div style="text-align: left;"><h3 class="text-justify">Website :<span style="margin: 0 10px 0 10px;"> '.$row['company_website'].'</h3></div>';
          echo '<div style="text-align: left;"><h3 class="text-justify">Landline:<span style="margin: 0 10px 0 10px;"> '.$row['company_landline'].'</h3></div>';
          echo '<div class="row">';
        ?>
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                     echo '<div class="col-md-6" style="text-align: center;margin-top: 10px;"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addcontact"><span class="glyphicon glyphicon-user"></span> Add Contact</button></div>';
                     $sql2 = $connection->query('select first_name, middle_initial, last_name, contact_num from contact_person inner JOIN company_contact on contact_person.id = company_contact.contact_id where company_contact.company_id = "'.$id.'"');
                ?>
            </div>
            <div class="col-md-6">
                   <div class="row col-md-12">
                      <?php
                        $query = $connection->query("select first_name, middle_initial, last_name, contact_num
                          from contact_person
                           WHERE
                          contact_id = any(select company_contact.contact_id from company_contact where company_contact.company_id = $id )");
                           while ($row = $query->fetch_assoc()) {
                            echo '<div style="text-align: left;"><h3 class="text-left">'.$row['first_name'].' '.$row['middle_initial'].' '.$row['last_name'].':<span style="margin: 0 10px 0 10px;"> '.$row['contact_num'].'</h3></div>';
                        }
                      ?>
                   </div>
            </div>
        </div>
    </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
  
 
   <hr>
   <div class="container" style="text-align: center;">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-2">
              <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#editcomp"><span class="glyphicon glyphicon-edit"></span> Edit Company</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-danger btn-lg"><a style="text-decoration: none;color: white;"
              <?php
                echo 'href="?id='.$id.'&amp;delete_id='.$id.'"';
              ?>
               title="click for delete" onclick="return confirm('are you sure you want to delete company ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete Company</a></button>
            </div>
            <div class="col-md-4">
            
            </div>
          </div>
        </div>
      </div>
   </div>

  <div class="modal fade text-left" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalg-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Add Contact Person</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">First Name</label>
          <input class="form-control" type="text" name="fname" placeholder="First Name" required>
        </div> 
        <div class="form-group col-md-12">
          <label for="exampleInputPassword1">Middle Initial</label>
          <input type="text" class="form-control" type="text" name="mi" placeholder="Middle Initial" row="5">
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Last Name</label>
          <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Address</label>
          <input class="form-control" type="text" name="add" placeholder="Address" required>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Email</label>
          <input class="form-control" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Mobile Number</label>
          <input class="form-control" type="text" name="mobile" placeholder="Mobile Number" required>
        </div>
          <button type="submit" class="btn btn-primary btn-md"  style="width:120px;" name="btnsave"><i class="glyphicon glyphicon-save"></i> Save</button> 
          <button type="button" class="btn btn-danger btn-md"  style="width:120px;" name="#" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i> Cancel</button> 
        </form>

        <hr>
      </div>
    </div>
  </div>
</div>

    <?php

      $sql_get_comp = $connection->query("select * from company where company_id=$id");
      $row_get_comp = $sql_get_comp->fetch_assoc();

    ?>

<div class="modal fade text-left" id="editcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalg-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Edit Company</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Company Name</label>
          <input class="form-control" type="text" name="name2" value="<?php echo $row_get_comp['company_name']; ?>" required>
        </div> 
        <div class="form-group col-md-12">
          <label for="exampleInputPassword1">Company Profile</label>
          <textarea type="password" class="form-control" type="text" name="profile2" rows="6" cols="50"><?php echo $row_get_comp['company_desc']; ?></textarea>
        </div>
        <div class="form-group  col-md-12">
          <label for="exampleInputPassword1">Company Address</label>
          <input class="form-control" type="text" name="address2" value="<?php echo $row_get_comp['company_address']; ?>" required>
        </div>
        <div class="form-group">
        <div class="form-row col-md-12">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Landline</label>
            <input class="form-control" type="text" name="landline2" value="<?php echo $row_get_comp['company_landline']; ?>" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Website</label>
            <input class="form-control" type="text" name="website2" value="<?php echo $row_get_comp['company_website'];?>">
          </div>
          </div>
        </div>
        <div class="form-group">
        <div class="form-row col-md-12">
          <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Company Logo</label>
          <input class="input-group" type="file" name="user_image2" accept="image/*"  />
          </div>
          <div class="form-group col-md-">
          </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md"  style="width:120px;" name="update_company"><i class="glyphicon glyphicon-save"></i> Save</button>
        <button type="button" class="btn btn-danger btn-md"  style="width:120px;" name="#" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i> Cancel</button> 
        </form>
        <hr>
      </div>
    </div>
  </div>
</div>

</body>
</html>
>>>>>>> 6e225d05c517cd22e65f5d8607da00eb4cf47fe2
