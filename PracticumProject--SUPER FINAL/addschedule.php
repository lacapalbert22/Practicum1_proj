<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>HOME</title>
        <link rel="icon" href="images/slulogo.png">
        <link rel="stylesheet" type="text/css" href="css/style.css" title="main">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <li>
                    <a href="home.html"><i class="fa fa-home"></i>HOME</a>
                </li>

                <li>
                    <a href="company.html"><i class="fa fa-building"></i>COMPANY</a>
                </li>

                <li class="selected">
                    <a href="schedule.php"><i class="fa fa-calendar"></i>SCHEDULE</a>
                </li>
            </ul>
        </div>
        <!--end of navigation-->

<div class="addschedfunc">
    <form method="POST" action="submit.inc.php">
        <input type="text" name="companyname" placeholder="CompanyName">
        <br>
        <input type="text" name="companydesc" placeholder="CompanyDescription">
        <br>
        <input type="text" name="availableslot" placeholder="availableslots">
        <br>

        <button type="submit" name="submit">Add</button>
    </form>
</div>












         <!--footer-->  
        <div id="footer">
            <p>Copyright &copy; Saint Louis University 2018 All Rights Reserved.</p>
        </div>
        <!--end of footer-->
    </body>

</html>