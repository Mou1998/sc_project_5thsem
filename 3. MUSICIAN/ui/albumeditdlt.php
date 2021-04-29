<?php
include 'nav.php';

require_once 'dbcon.php';
// Album delete
if(isset($_GET['del_id']))
{
   
    $saveAlbum="DELETE FROM `albums` WHERE A_id=" . $_GET["del_id"] . "";
    mysqli_query($dbcon,$saveAlbum);?>
<script type="text/javascript">
	alert("Album removed\!");
	window.location.href = "albumeditdlt.php";
</script>;
<?php
}


if(isset($_GET['edit_id']))
	{
				include_once 'dbcon.php';
				if(count($_POST)>0) {
				mysqli_query($dbcon,"UPDATE Albums set A_Name = '" . $_POST['A_Name'] . "' , Copyright_Date = '" . $_POST['Copyright_Date'] . "' , Format = '" . $_POST['Format'] . "'  WHERE A_Id='" . $_POST['A_Id'] . "' ");
				$message = "Album Modified Successfully";
				}
				$result = mysqli_query($dbcon,"SELECT * FROM Albums WHERE A_Id='" . $_GET['edit_id'] . "'");
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
		<input type="hidden" class="form-control" name="A_Id" class="txtField" value="<?php echo $row['A_Id']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Album Name:</label>
		<input type="text" class="form-control" name="A_Name" class="txtField" value="<?php echo $row['A_Name']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Copyright_Date:</label>
		<input type="text" class="form-control" name="Copyright_Date" class="txtField" value="<?php echo $row['Copyright_Date']; ?>">
		<br><label for="exampleFormControlInput1" class="form-label">Album Format:</label>
		<input type="text" class="form-control" name="Format" class="txtField"
			value="<?php echo $row['Format']; ?>">
		<hr><input type="submit" class="btn btn-warning" name="submit" value="Submit" class="buttom">
	</form>
</div>
<?php	} ?>


<div class="alert alert-danger">
	<center>
		<h3><strong>Album Management</strong> </h3>
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
				<th>A_id</th>
				<th>A_Name</th>
				<th>Copyright_Date</th>
				<th>Format</th>
                <th>Ssn</th>
				<!--<th>Action</th>-->
			</tr>
		</thead>
		<tbody>
			<?php
include("dbcon.php");

$stm = "select * from Albums";
$stmt=mysqli_query($dbcon,$stm);

if (mysqli_num_rows($stmt)>0) 
{
	while ($row = $stmt->fetch_assoc()) 
	{
		extract($row);
?>
			<tr>

				<td><?php echo $A_Id; ?></td>
				<td><?php echo $A_Name; ?></td>
				<td><?php echo $Copyright_Date; ?></td>
				<td><?php echo $Format; ?></td>
                <td><?php echo $Ssn; ?></td>
				<!--<td>
					<a class="btn btn-danger" href="albumeditdlt.php?del_id=<?php/* echo $row['A_Id']; */?>">Delete</a>
					<a class="btn btn-success" href="albumeditdlt.php?edit_id=<?php/* echo $row['A_Id']; */?>">Edit</a>
				</td>-->
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
</div>
<?php
include 'function.php';
?>