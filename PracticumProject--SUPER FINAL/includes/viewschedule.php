<!DOCTYPE html>
<?php
 include '../includes/dbh.inc.php';
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SCHEDULE</title>
        <link rel="icon" href="../images/slulogo.png">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       
        <link rel="stylesheet" type="text/css" href="../css/style2.css" title="main">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>
         
    
        <!--header_window-->
        <div class="header-container">
            <img class="scislogo" src="../images/slulogo.png">
            <div id="title-page">SLU iRecruit</div>
            <div id="logout-btn">Logout</div>
        </div>
        <!--end of header_window-->

        <!--navigation-->
        <div class="nav-container">
            <ul>
             <li>
                <a href="../home.php"><i class="fa fa-home"></i>HOME</a>
             </li>
             <li>
                <a href="../company.html"><i class="fa fa-building"></i>COMPANY</a>
             </li>
                 <li class="selected">
                <a href="../schedule.php"><i class="fa fa-calendar"></i>SCHEDULE</a>
             </li>
            </ul>
        </div>
        <!--end of navigation-->

        

        
        <?php
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);


           
           echo '<table class="eventcontent" border="1">'; 
           echo '<tr><td><strong>Event Name:</strong></td><td>'.$row['event_name'].'</td></tr>';
           echo '<tr><td><strong>Event Description:</strong></td><td>'.$row['event_desc'].'</td></tr>';
           echo '<tr><td><strong>Event Venue:</strong></td><td>'.$row['event_venue'].'</td></tr>';
           echo '<tr><td><strong>Event Time:</strong><td>'.$row['time1'].'-';
           echo  $row['time2'].'</td></tr>';
           echo '<tr><td><strong>Date:</strong></td><td>'.$row['event_date'].'</td></tr>';
           echo '<tr><td><strong>Slots Available:</strong></td><td>'.$row['available_slot'].'</td></tr>';
           echo '</table>';

       }
        
        ?>  

       

        <?php
        
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $row= mysqli_fetch_array($res);
        
 


           echo "<a class='parlink' href='viewpar.php?viewpar=$id'>View Participants</a>";

        }

         ?>

         





        
        

         <!--footer-->  
    <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </div>
        <!--end of footer-->
     
    </body>
        <script src="../css/buttons1.js" async></script>

</html>