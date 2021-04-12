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

$check_c="select * from albums WHERE (A_Name='$a_name' and Copyright_Date='$copyright') and (Ssn='$producer') ";
    $run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)>0)
    {
        echo "<script>alert('Album is already exist,Please try another one!')</script>";
        // echo"<script>window.open('musician.php','_self')</script>";
        exit();
    }

$savealbum="insert into albums (A_Name,Copyright_Date,Format,Ssn) VALUE ('$a_name','$copyright','$format','$producer')";
mysqli_query($dbcon,$savealbum);

echo"<script>alert('Data successfully saved')</script>";				

}

?>
