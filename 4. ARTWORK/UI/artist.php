<?php
session_start();
?>

<?php
include("dbcon.php");
//artist add
if(isset($_POST['add']))
{
$a_name = $_POST['a_name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$style = $_POST['style'];
$check_c="SELECT * from artists WHERE name='$a_name' ";
$run_query=mysqli_query($dbcon,$check_c);

if(mysqli_num_rows($run_query)>0)
{
?>
    <script type="text/javascript"> 
        alert('Artist is already exist,Please try another one!'); 
        window.location.href = "home.php";
    </script>;
<?php
exit();
}

$saveartist="INSERT into artists (name,dob,address,style_of_art) VALUES ('$a_name','$dob','$address','$style')";
if(mysqli_query($dbcon,$saveartist)){

?>
    <script type="text/javascript"> 
	    alert('Data successfully saved'); 
	   window.location.href = "home.php";
    </script>;
<?php				
}
else {
    ?><script type="text/javascript"> 
        alert('Sql not run'); 
       window.location.href = "home.php";
    </script>;
<?php  ?>
}
}
//artist address edit
if(isset($_POST['edit']))
{
$a_name = $_POST['a_name'];
$address = $_POST['address'];

$check_c="SELECT * from artists WHERE name='$a_name' and Existance='Exist' ";
$run_query=mysqli_query($dbcon,$check_c);

if(mysqli_num_rows($run_query)<1)
{
?>
    <script type="text/javascript"> 
        alert('Artist does not exist,Please try another one!'); 
        window.location.href = "home.php";
    </script>;
<?php
exit();
}

$editartist="UPDATE artists SET address = '$address' WHERE name='$a_name'";
mysqli_query($dbcon,$editartist);

?>
    <script type="text/javascript"> 
	    alert('Data successfully saved'); 
	   window.location.href = "home.php";
    </script>;
<?php				

}

//artist delete

if(isset($_POST['delete']))
{
$a_name = $_POST['a_name'];
$check_c="SELECT * from artists WHERE name='$a_name' and Existance='Exist' ";
$run_query=mysqli_query($dbcon,$check_c);

if(mysqli_num_rows($run_query)<1)
{
?>
    <script type="text/javascript"> 
        alert('Artist does not exist,Please try another one!'); 
        window.location.href = "home.php";
    </script>;
<?php
exit();
}

$deleteartist="UPDATE artists SET Existance='Not_Exist' WHERE name='$a_name'";
mysqli_query($dbcon,$deleteartist);

?>
    <script type="text/javascript"> 
	    alert('Data successfully saved'); 
	   window.location.href = "home.php";
    </script>;
<?php				

}

?>

