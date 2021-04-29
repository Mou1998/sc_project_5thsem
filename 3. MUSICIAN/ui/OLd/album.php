<?php
session_start();
?>

<?php
include("dbcon.php");
if(isset($_POST['add']))
{
$a_name = $_POST['a_name'];
$copyright = $_POST['copyright'];
$format = $_POST['format'];
$producer = $_POST['producer'];

$check_c="SELECT * from albums WHERE (A_Name='$a_name' and Copyright_Date='$copyright') and (Ssn='$producer') ";
    $run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)>0)
    {
        //echo "<script>alert('Album is already exist,Please try another one!')</script>";
        // echo"<script>window.open('musician.php','_self')</script>";
    ?>
        <script type="text/javascript"> 
	        alert('Album is already exist,Please try another one!'); 
	        window.location.href = "dashboard.php";
        </script>;
    <?php
    exit();
    }

$savealbum="INSERT into albums (A_Name,Copyright_Date,Format,Ssn) VALUES ('$a_name','$copyright','$format','$producer')";
mysqli_query($dbcon,$savealbum);

//echo"<script>alert('Data successfully saved')</script>";
?>
    <script type="text/javascript"> 
	    alert('Data successfully saved'); 
	    window.location.href = "dashboard.php";
    </script>;
<?php				

}

?>
