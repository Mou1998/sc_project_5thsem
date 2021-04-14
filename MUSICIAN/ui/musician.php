<?php
session_start();
?>

<?php
include("dbcon.php");
// musician add
if(isset($_POST['add']))
{
$m_name = $_POST['m_name'];
$m_add = $_POST['address'];
$m_ph = $_POST['ph'];
$instrument = $_POST['instrument'];
$ins_array = explode ("," , $instrument);

$check_c="select * from addresses WHERE (Ph_No='$m_ph' and not FullAddress='$m_add') or (not Ph_No='$m_ph' and FullAddress='$m_add') ";
$run_query=mysqli_query($dbcon,$check_c);

    if(mysqli_num_rows($run_query)>0)
    {
        echo "<script>alert('There may be wrong information,Please try again!')</script>";
        // echo"<script>window.open('musicianform.php','_self')</script>";
        
        exit();
    }
$check_a="select * from addresses WHERE (Ph_No='$m_ph' and FullAddress='$m_add') ";
$run_query=mysqli_query($dbcon,$check_a);
    
    if(mysqli_num_rows($run_query)<1)
    {
        $musiaddress="insert into addresses (Ph_No,FullAddress) VALUE ('$m_ph','$m_add')";
        mysqli_query($dbcon,$musiaddress);
        exit();
    }

$savemusician="insert into musicians (Name,Ph_No) VALUE ('$m_name','$m_ph')";
mysqli_query($dbcon,$savemusician);

$musi = "select Ssn from musicians where Ssn=(select max(Ssn) from musicians)" ;
$ssnid1 = mysqli_query($dbcon,$musi);
$row = mysqli_fetch_array($ssnid1)["Ssn"];
    /*while($row = mysqli_fetch_array($ssnid1))
    {
        echo $row["Ssn"];
    }*/

foreach ($ins_array as $value)
{
    $check_i="select * from instruments WHERE Ins_name='$value' ";
    $run_query=mysqli_query($dbcon,$check_i);

    if(mysqli_num_rows($run_query)>0)
    {
        $saveplay="insert into plays (Ins_name,Ssn) VALUE ('$value','$row')";
        mysqli_query($dbcon,$saveplay);
    }
    else
    {
        $key = "C,B_FlAT,E_FLAT";
        $key_array = explode ("," , $key);
        foreach ($key_array as $value1)
        {
            $saveins="insert into instruments (Ins_name,MusicalKey) VALUE ('$value','$value1')";
            mysqli_query($dbcon,$saveins);
        }

        $saveplay="insert into plays (Ins_name,Ssn) VALUE ('$value','$row')";
        mysqli_query($dbcon,$saveplay);
    }
    
}

echo"<script>alert('Data successfully saved')</script>";
echo "<script>window.open('index.php','_self')</script>";


}


// musician edit
if(isset($_POST['edit']))
{
    $m_id = $_POST['m_id'];
    $m_name = $_POST['m_name'];
    $m_add = $_POST['address'];
    $m_ph = $_POST['ph'];

    $check_c="select * from musicians WHERE (Ssn='$m_id' and Existance='Exist') ";
    $run_query=mysqli_query($dbcon,$check_c);

        if(mysqli_num_rows($run_query)<1)
        {
            echo "<script>alert('Musician does not exits!')</script>";
            // echo"<script>window.open('musician.php','_self')</script>";
            exit();
        }
    $check_c="select * from addresses WHERE (Ph_No='$m_ph' and not FullAddress='$m_add') or (not Ph_No='$m_ph' and FullAddress='$m_add') ";
    $run_query=mysqli_query($dbcon,$check_c);
        
        if(mysqli_num_rows($run_query)>0)
        {
            echo "<script>alert('There may be wrong information,Please try again!')</script>";
            // echo"<script>window.open('musicianform.php','_self')</script>";
                
            exit();
        }
    
    $check_a="select * from addresses WHERE (Ph_No='$m_ph' and FullAddress='$m_add') ";
    $run_query=mysqli_query($dbcon,$check_a);
            
        if(mysqli_num_rows($run_query)<1)
        {
            $musiaddress="insert into addresses (Ph_No,FullAddress) VALUE ('$m_ph','$m_add')";
            mysqli_query($dbcon,$musiaddress);
            exit();
        }
        
    $savemusician="update musicians set Name = '$m_name' , Ph_No = '$m_ph' where Ssn='$m_id' ";
    mysqli_query($dbcon,$savemusician);

}


// musician delete
if(isset($_POST['delete']))
{
    $m_id = $_POST['m_id'];

    $check_c="select * from musicians WHERE (Ssn='$m_id' and Existance='Exist') ";
    $run_query=mysqli_query($dbcon,$check_c);

        if(mysqli_num_rows($run_query)<1)
        {
            echo "<script>alert('Musician already does not exits!')</script>";
            // echo"<script>window.open('musician.php','_self')</script>";
            exit();
        }
    
    
    $savemusician="update musicians set Existance = 'Not_Exist' where Ssn='$m_id' ";
    mysqli_query($dbcon,$savemusician);
    // echo "<script>alert('Musician's existance removed!')</script>";

}


?>

