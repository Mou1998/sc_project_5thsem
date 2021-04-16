<?php
session_start();
?>

<?php
include("dbcon.php");
if(isset($_POST['add']))
{
$a_name = $_POST['a_name'];
$age = $_POST['age'];
$address = $_POST['address'];
$style = $_POST['style'];

$check_c="SELECT * from artists WHERE name='$a_name' ";
$run_query=mysqli_query($dbcon,$check_c);

if(mysqli_num_rows($run_query)>0)
{
?>
    <script type="text/javascript"> 
        alert('Artist is already exist,Please try another one!'); 
        window.location.href = "index.html";
    </script>;
<?php
}

$saveartist="INSERT into artists (name,age,address,style_of_art) VALUES ('$a_name','$age','$address','$style')";
mysqli_query($dbcon,$saveartist);

?>
    <script type="text/javascript"> 
	    alert('Data successfully saved'); 
	   window.location.href = "index.html";
    </script>;
<?php				

}

?>
