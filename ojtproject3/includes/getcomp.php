<?php
$connect = mysqli_connect("localhost", "root", "", "sample");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "select * from company where company_name like '%".$search."%'";
}
else
{
 $query = "
 select * from company;
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    echo        '<div class="row">';
 while($row = mysqli_fetch_array($result))
 {
    extract($row);

    echo            '<div class="col-md-4 text-center border" style="margin-top: 50px;margin-bottom:50px;">';
    echo                '<div class="card">';
    echo                    '<card class="body">';
    echo                        '<img src="images/company/'.$row['company_logo'].'" alt="" style="max-height: 100px; max-width: 300px;min-height: 100px; min-width: 300px;">';
    echo                    '</card>';
    echo                    '<div class="card-footer" >';
    echo                        '<a href="viewprofile.php?id='.$row['company_id'].'" class="card-title" style="font-size: 15px; color: white; text-decoration: none;">
                                    <button class="btn btn-primary" style="width: 200px;background-color: #000040;">'.$row['company_name'].'</button></a>';
    echo                    '</div>';
    echo                '</div>';  
    echo            '</div>';              
 }
    echo        '</div>';
}
else
{
 echo 'Data Not Found';
}

?>

