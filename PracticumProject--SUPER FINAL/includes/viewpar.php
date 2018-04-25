<!DOCTYPE html>
<?php
 include 'dbh.inc.php';
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

        <table class ="db" width="600" border="0" cellpadding="1" cellspacing="1">
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Initial</th>
        <th>Email</th>
        <th>Contact</th>
     
       <?php

        if( isset($_GET['viewpar']) )
         {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['viewpar'];
        $sql = "SELECT * FROM participants WHERE event_fk='$id'";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
                 
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           echo '<tr>';
           echo '<td>'.$row['par_lastname'].'</td>';
           echo '<td>'.$row['par_firstname'].'</td>';
           echo '<td>'.$row['par_mi'].'</td>';
           echo '<td>'.$row['par_email'].'</td>';
           echo '<td>'.$row['par_contact'].'</td>';   
           echo "<td><a href='editpar.php?editpar=$row[par_id]'>Edit</a></td>";
           echo '</tr>'; 



        }
        }
        }


  


        ?>


     <div class ="power">
    <button id="addpar">Add Paticipants</button>    
    </div>

    <div id="add-par" class="modal3">
    <div class="modal-content">
    <span class="close3">&times;</span>
    <?php
        if( isset($_GET['view']) )
        {
        $con = mysqli_connect('localhost', 'root', '', 'sample');
        $id = $_GET['view'];
        $sql = "SELECT * FROM events WHERE id='$id'";
            echo "<form method='POST' action='addpar.php?addpar='$id' autocomplete='off'>";
         }
         ?> 

        Last name:<input type="text" name="parlastname"  required>   
        First Name:<input type="text" name="parfirstname" required>
        Middle Initial: <input type="text" name="parmi"  required>
        Email:<input type="text" name="paremail">
        Contact: <input type="text" name="parcontact" required>
       
        
        <button type="submit" name="Submit">Add</button> 
        <button type="submit" name="Cancel" formaction="schedule.php">Cancel</button> 

         </form>


    </div>
    </div>

   

    

        

    <script src="../css/buttons1.js" async></script>

         <!--footer-->  
    <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
    </div>
        <!--end of footer-->
     
    </body>

</html>