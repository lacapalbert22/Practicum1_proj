<!DOCTYPE html>
<html lang="en">
<?php
 include 'includes/dbh.inc.php';
?>

    <head>
        <meta charset="utf-8">
        <title>HOME</title>
        <link rel="icon" href="images/slulogo.png">
        <link rel="stylesheet" type="text/css" href="css/style.css" title="main">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <!--header_window-->
    	<div class="header-container">
    		<img class="scislogo" src="images/slulogo.png">
            <div id="title-page">SLU iRecruit</div>
    		<div id="logout-btn">Logout</div>
    	</div>
        <!--end of header_window-->

        <!--navigation-->
    	<div class="nav-container">
    		<ul>
    			<li class="selected">
                    <a href="home.php"><i class="fa fa-home"></i>HOME</a>
                </li>

    			<li>
                    <a href="company.html"><i class="fa fa-building"></i>COMPANY</a>
                </li>

    			<li>
                    <a href="schedule.php"><i class="fa fa-calendar"></i>SCHEDULE</a>
                </li>
    		</ul>
    	</div>
        <!--end of navigation-->



      
        <table class ="eventhome" width="600" border="0" cellpadding="100" cellspacing="2">
        <th class="titlehomepage" align="left">Upcoming Events</th>
   
   

        
        <?php
        $sql = "SELECT * FROM events";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

        
           echo '<tr><td> '.$row['event_name'].'</td></tr>';
           echo '<tr><td>'.$row['event_desc'].'</td></tr>';
           echo '<tr><td>Available Slots:'.$row['available_slot'].'</td></tr>';
               
       }
    }
        ?>  
    </table>









    	 <!--footer-->	
		<div id="footer">
        	<p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
   		</div>
    	<!--end of footer-->
    </body>

</html>