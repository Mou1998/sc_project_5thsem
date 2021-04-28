<?php
include 'nav.php';
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
    ?>
        <script type="text/javascript"> 
        alert('Wrong input , please try again!'); 
        window.location.href = "dashboard.php";
        </script>;
    <?php
    exit();
    }
$check_a="select * from addresses WHERE (Ph_No='$m_ph' and FullAddress='$m_add') ";
$run_query=mysqli_query($dbcon,$check_a);
    
    if(mysqli_num_rows($run_query)<1)
    {
        $musiaddress="insert into addresses (Ph_No,FullAddress) VALUE ('$m_ph','$m_add')";
        mysqli_query($dbcon,$musiaddress);
    }

$savemusician="insert into musicians (Name,Ph_No) VALUE ('$m_name','$m_ph')";
mysqli_query($dbcon,$savemusician);

$musi = "select Ssn from musicians where Ssn=(select max(Ssn) from musicians)" ;
$ssnid1 = mysqli_query($dbcon,$musi);
$row = mysqli_fetch_array($ssnid1)["Ssn"];

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
?>
<script type="text/javascript"> 
        alert('Data successfully saved'); 
        window.location.href = "musicianeditdlt.php";
</script>;
<?php

}
?>
<!DOCTYPE html>
<html>
    <head>
           <title>Musician</title>
        <link href="style2.css" rel="stylesheet" />
    </head>
    <body>
        <div class="form-wrap2">
                <form id="frm1" role="form" method="POST" action="">
                <label for="formGroupExampleInput" class="form-label">Musician Record</label>
                    <input type="text" class="form-control" placeholder="Musician Full Name" name="m_name" required>
                    <input type="number" class="form-control" placeholder="Phone Number" name="ph" required>
                    <input type="text" class="form-control" placeholder="Full Address" name="address" required>
                    <input type="text" class="form-control" placeholder="Instruments plays" name="instrument" required>
                    <input type="submit" class="button-generate" name="add" value="ADD NOW">
                </form>
        </div>
    </body>
</html>
<?php
include 'function.php';
?>