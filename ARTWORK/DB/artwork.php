<?php
session_start();
?>

<?php
include("dbcon.php");
// musician add
if(isset($_POST['add']))
{
$a_name = $_POST['a_name'];
$title = $_POST['title'];
$price = $_POST['price'];
$type = $_POST['type'];
$year = $_POST['year_of_made'];
$group = $_POST['groupname'];
$group_array = explode ("," , $group);

$check_c="select * from artwork WHERE title= '$title' ";
$run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)>0)
    {
    ?>
        <script type="text/javascript"> 
        alert('Art already exist, Please try again!'); 
        window.location.href = "index.php";
        </script>;
    <?php
    exit();
    }
$check_c="select * from artists WHERE name= '$a_name' and Existance='Exist' ";
$run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)<1)
    {
    ?>
        <script type="text/javascript"> 
        alert('Artist does not exist, Please try again!'); 
        window.location.href = "index.php";
        </script>;
    <?php
    exit();
    }
$addart="INSERT INTO artwork (title,type,year_of_made,price,a_name) VALUE ('$title','$type','$year','$price','$a_name')";
mysqli_query($dbcon,$addart);
foreach ($group_array as $value)
{
    $check_g="select * from groups WHERE g_name='$value' ";
    $run_query=mysqli_query($dbcon,$check_g);

    if(mysqli_num_rows($run_query)<1)
    {
        $savegroup="insert into groups (g_name) VALUE ('$value')";
        mysqli_query($dbcon,$savegroup);
        
    }
    $saveclass="insert into classify (a_title,g_name) VALUE ('$title','$value')";
    mysqli_query($dbcon,$saveclass);
       
}
?>
<script type="text/javascript"> 
        alert('Data successfully saved'); 
        window.location.href = "index.php";
</script>;
<?php

}


// artwork edit
if(isset($_POST['edit']))
{
$title = $_POST['title'];
$price = $_POST['price'];
$group = $_POST['groupname'];
$group_array = explode ("," , $group);

$check_c="select * from artwork WHERE title= '$title' ";
$run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)<1)
    {
    ?>
        <script type="text/javascript"> 
        alert('Art does not exist, Please try again!'); 
        window.location.href = "index.php";
        </script>;
    <?php
    exit();
    }
    $editart="UPDATE artwork SET price='$price'";
    mysqli_query($dbcon,$editart);
    foreach ($group_array as $value)
    {
    $check_g="select * from groups WHERE g_name='$value' ";
    $run_query=mysqli_query($dbcon,$check_g);

        if(mysqli_num_rows($run_query)<1)
        {
            $savegroup="insert into groups (g_name) VALUE ('$value')";
            mysqli_query($dbcon,$savegroup);
            
        }
    $check_c="select * from classify WHERE g_name='$value' and a_title= '$title'";
    $run_query=mysqli_query($dbcon,$check_c);
    if(mysqli_num_rows($run_query)<1)
        {
            $saveclass="insert into classify (a_title,g_name) VALUE ('$title','$value')";
            mysqli_query($dbcon,$saveclass);
            
        }
    
       
    }
?>
<script type="text/javascript"> 
        alert('Data successfully saved'); 
        window.location.href = "index.php";
</script>;
<?php

}
?>