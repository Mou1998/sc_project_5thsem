<?php
session_start();
?>


<?php
include("dbcon.php");
if(isset($_POST['edit']))
{
	$title = $_POST['title'];
	$musician = $_POST['ssn'];
	$musi_array = explode ("," , $musician);


	$check_c="select * from songs WHERE Title='$title' ";
	    $run_query=mysqli_query($dbcon,$check_c);

	    if(mysqli_num_rows($run_query)<1)
	    {
	        //echo "<script>alert('Song is already exist,Please try another one!')</script>";
	        // echo"<script>window.open('musician.php','_self')</script>";
	    ?>
	        <script type="text/javascript"> 
	        alert('Song does not exist,Please try another one!'); 
	        window.location.href = "index.html";
	        </script>;
	    <?php
		exit();
	    }
	

	foreach ($musi_array as $value)
	{
        $check_c="select * from performs WHERE Title='$title' and Ssn = '$value' ";
	    $run_query=mysqli_query($dbcon,$check_c);

	    if(mysqli_num_rows($run_query)<1)
	    {
	        $saveperform="INSERT into performs (Ssn,Title) VALUES ('$value','$title')";
	        mysqli_query($dbcon,$saveperform);
        }
	    
	}

	//echo"<script>alert('Data successfully saved')</script>";
	?>
        <script type="text/javascript"> 
        alert('Data successfully saved'); 
        window.location.href = "index.html";
        </script>;
    <?php				

}

?>
