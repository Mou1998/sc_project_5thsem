<?php
session_start();
?>

<?php
include("dbcon.php");
if(isset($_POST['add']))
{
$m_name = $_POST['m_name'];
$m_add = $_POST['address'];
$m_ph = $_POST['ph'];

$check_c="select * from addresses WHERE (Ph_No='$m_ph' and not FullAddress='$m_add') or (not Ph_No='$m_ph' and FullAddress='$m_add') ";
    $run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)>0)
    {
        echo "<script>alert('There may be wrong information,Please try again!')</script>";
        // echo"<script>window.open('musician.php','_self')</script>";
        exit();
    }
$musiaddress="insert into addresses (Ph_No,FullAddress) VALUE ('$m_ph','$m_add')";
mysqli_query($dbcon,$musiaddress);

$savemusician="insert into musicians (Name,Ph_No) VALUE ('$m_name','$m_ph')";
mysqli_query($dbcon,$savemusician);

echo"<script>alert('Data successfully saved')</script>";				

}

?>
