<?php
session_start();
?>

<?php
include("dbcon.php");
if(isset($_POST['add']))
{
	$title = $_POST['title'];
	$author = $_POST['author'];
	$album = $_POST['album'];
	$musician = $_POST['ssn'];
	$musi_array = explode ("," , $musician);


	$check_c="select * from songs WHERE Title='$title' ";
	    $run_query=mysqli_query($dbcon,$check_c);

	    if(mysqli_num_rows($run_query)>0)
	    {
	        //echo "<script>alert('Song is already exist,Please try another one!')</script>";
	        // echo"<script>window.open('musician.php','_self')</script>";
	    ?>
	        <script type="text/javascript"> 
	        alert('Song is already exist,Please try another one!'); 
	        window.location.href = "album.html";
	        </script>;
	    <?php
	    }
	$songadd="INSERT into songs (Title,Author,A_Id) VALUES ('$title','$author','$album')";
	mysqli_query($dbcon,$songadd);

	foreach ($musi_array as $value)
	{
	        $saveperform="INSERT into performs (Ssn,Title) VALUES ('$value','$title')";
	        mysqli_query($dbcon,$saveperform);
	    
	}

	//echo"<script>alert('Data successfully saved')</script>";
	?>
        <script type="text/javascript"> 
        alert('Data successfully saved'); 
        window.location.href = "album.html";
        </script>;
    <?php				

}

?>
