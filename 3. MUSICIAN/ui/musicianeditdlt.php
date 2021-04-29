<?php

include "nav.php";
require_once 'dbcon.php';
// musician delete
if(isset($_GET['del_id']))
{
   
    $savemusician="UPDATE musicians set Existance = 'Not_Exist' where Ssn=" . $_GET["del_id"] . "";
    mysqli_query($dbcon,$savemusician);?>
<script type="text/javascript">
	alert("Musician's existance removed\!");
	window.location.href = "musicianeditdlt.php";
</script>;
<?php
}


if(isset($_GET['edit_id']))
	{
				include_once 'dbcon.php';
				if(count($_POST)>0) {
					$m_ph=$_POST['Ph_No'];
					$m_add=$_POST['Address'];
					$m_id=$_POST['Ssn'];
					$m_name=$_POST['Name'];
					$check_c="select * from addresses WHERE (Ph_No='$m_ph' and not FullAddress='$m_add') or (not Ph_No='$m_ph' and FullAddress='$m_add') ";
    $run_query=mysqli_query($dbcon,$check_c);
        
        if(mysqli_num_rows($run_query)>0)
        {
            //echo "<script>alert('There may be wrong information,Please try again!')</script>";
            // echo"<script>window.open('musicianform.php','_self')</script>";
        
        }
    
    $check_a="select * from addresses WHERE (Ph_No='$m_ph' and FullAddress='$m_add') ";
    $run_query=mysqli_query($dbcon,$check_a);
            
        if(mysqli_num_rows($run_query)<1)
        {
            $musiaddress="INSERT into addresses (Ph_No,FullAddress) VALUE ('$m_ph','$m_add')";
            mysqli_query($dbcon,$musiaddress);
        }
        
    $savemusician="UPDATE musicians set Name = '$m_name' , Ph_No = '$m_ph' WHERE Ssn='$m_id' ";
    mysqli_query($dbcon,$savemusician);

				/*mysqli_query($dbcon,"UPDATE musicians set Name = '" . $_POST['Name'] . "' , Ph_No = '" . $_POST['Ph_No'] . "' , Existance = '" . $_POST['Existance'] . "'  WHERE Ssn='" . $_POST['Ssn'] . "' ");
				$message = "Record Modified Successfully";*/
				}
				$result = mysqli_query($dbcon,"SELECT Ssn, Name, musicians."."Ph_No, FullAddress FROM musicians, addresses WHERE Ssn='" . $_GET['edit_id'] . "'"."AND musicians.Ph_No = addresses.Ph_No");
				$row= mysqli_fetch_array($result);
?>

<div class="form-group">
	<style>
		.form-inline {
			width: 300px;
			background: #009879;
			padding: 40px 20px;
			box-sizing: border-box;
			border-radius: 5px 5px 5px 5px;
			margin-left: 35rem;
			margin-top: 2rem;

		}
	</style>

	<form class="form-inline" method="post" action="">
		<div>
			<h3><?php if(isset($message)) { echo $message; } ?></h3>
		</div>
		<input type="hidden" class="form-control" name="Ssn" class="txtField" value="<?php echo $row['Ssn']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Musician Name:</label>
		<input type="text" class="form-control" name="Name" class="txtField" value="<?php echo $row['Name']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Phone No:</label>
		<input type="text" class="form-control" name="Ph_No" class="txtField" value="<?php echo $row['Ph_No']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Address:</label>
		<input type="text" class="form-control" name="Address" class="txtField"
			value="<?php echo $row['FullAddress']; ?>">
		<hr><input type="submit" class="btn btn-warning" name="submit" value="Submit" class="buttom">
	</form>
</div>
<?php	} ?>


<div class="alert alert-danger">
	<center>
		<h3><strong>Musician Management</strong> </h3>
	</center>
</div> <br />


<style>
	.table-responsive {
		width: 100%;
		height: 800px;
		
		align-content: right;
		margin-left: 20rem;
		
	}
</style>
<div class="table-responsive">
	<table class="table-bordered" width="70%">
		<thead>
			<tr>
				<th>SSN</th>
				<th>Name</th>
				<th>PHN No</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
include("dbcon.php");

$stm = "SELECT Ssn, Name, musicians."."Ph_No, FullAddress FROM musicians, addresses WHERE Existance='Exist' AND musicians.Ph_No = addresses.Ph_No";
$stmt=mysqli_query($dbcon,$stm);

if (mysqli_num_rows($stmt)>0) 
{
	while ($row = $stmt->fetch_assoc()) 
	{
		extract($row);
?>
			<tr>

				<td><?php echo $Ssn; ?></td>
				<td><?php echo $Name; ?></td>
				<td><?php echo $Ph_No; ?></td>
				<td><?php echo $FullAddress; ?></td>
				<td>
					<a class="btn btn-danger" href="musicianeditdlt.php?del_id=<?php echo $row['Ssn']; ?>">Delete</a>
					<a class="btn btn-success" href="musicianeditdlt.php?edit_id=<?php echo $row['Ssn']; ?>">Edit</a>
				</td>
			</tr>
			<?php
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	echo "<br />";
	echo '
	</div>';
}
else {
?>
			<div class="col-xs-12">
				<div class="alert alert-warning">
					<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
				</div>
			</div>
			<?php
}
?>
</div>
</div>
<br />
<br />
</div>
</div> <?php
include "function.php";
?>