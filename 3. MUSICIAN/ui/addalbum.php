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
	        window.location.href = "album.php";
        </script>;
    <?php
    exit();
    }
    else {

$savealbum="INSERT into albums (A_Name,Copyright_Date,Format,Ssn) VALUES ('$a_name','$copyright','$format','$producer')";
mysqli_query($dbcon,$savealbum);

//echo"<script>alert('Data successfully saved')</script>";
?>
    <script type="text/javascript"> 
	    alert('Data successfully saved'); 
	    window.location.href = "albumeditdlt.php";
    </script>;
<?php				

}
}

?>


<?php
include 'nav.php';
?><!DOCTYPE html>
<html>
    <head>
           <title>Album</title>
        <link href="style2.css" rel="stylesheet" />
    </head>
    <body>

    
        <div class="form-wrap2">
            
            <form role="form" method="POST" action="">
        
                <h1>New Album </h1>
                <input type="text" class="form-control" placeholder="Album Name" name="a_name" required>
                <input type="date" class="form-control" placeholder="Copyright Date" name="copyright" required>
                <input type="text" class="form-control" placeholder="Album Format" name="format" required>
                <input type="number" class="form-control" placeholder="Producer ID" name="producer" required>
                <input type="submit" class="button-generate" name="add" value="ADD NOW">

            </form>
        
        </div>
    
<?php
include 'function.php';
?>