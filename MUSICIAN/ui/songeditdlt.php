<?php

include "nav.php";
require_once 'dbcon.php';

if(isset($_GET['del_id']))
{
   
    $saveAlbum="DELETE FROM songs WHERE Title=" . $_GET["del_id"] . "";
    mysqli_query($dbcon,$saveAlbum);?>
<script type="text/javascript">
	alert("Song removed\!");
	window.location.href = "songeditdlt.php";
</script>;
<?php
}


include("dbcon.php");
if(isset($_GET['edit_id']))
{
	
	#$musician = $_POST['ssn'];
	#$musi_array = explode ("," , $musician);
            if(count($_POST)>0) {
				mysqli_query($dbcon,"UPDATE songs set Title = '" . $_POST['Title'] . "' , Author = '" . $_POST['Author'] . "' , A_Id = '" . $_POST['A_Id'] . "'  WHERE Title='" . $_POST['Title'] . "' ");
				$message = "Song Modified Successfully";
				}
				$result = mysqli_query($dbcon,"SELECT * FROM songs WHERE Title='" . $_GET['edit_id'] . "'");
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
        <label for="exampleFormControlInput1" class="form-label">Song Title:</label>
		<input type="text" class="form-control" name="Title" class="txtField" value="<?php echo $row['Title']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Author Name:</label>
		<input type="text" class="form-control" name="Author" class="txtField" value="<?php echo $row['Author']; ?>">
		<label for="exampleFormControlInput1" class="form-label">Author Id:</label>
		<input type="text" class="form-control" name="A_Id" class="txtField" value="<?php echo $row['A_Id']; ?>">
       
		<hr><input type="submit" class="btn btn-warning" name="submit" value="Submit" class="buttom">
	</form>
</div>
<?php	} ?>


<div class="alert alert-danger">
	<center>
		<h3><strong>Song Management</strong> </h3>
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
				<th>Title</th>
				<th>Author</th>
				<th>A_Id</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
include("dbcon.php");

$stm = "select * from songs";
$stmt=mysqli_query($dbcon,$stm);

if (mysqli_num_rows($stmt)>0) 
{
	while ($row = $stmt->fetch_assoc()) 
	{
		extract($row);
?>
			<tr>

				<td><?php echo $Title; ?></td>
				<td><?php echo $Author;?></td>
				<td><?php echo $A_Id; ?></td>
				<td>
					<a class="btn btn-danger" href="songeditdlt.php?del_id=<?php echo $row['Title']; ?>">Delete</a>
					<a class="btn btn-success" href="songeditdlt.php?edit_id=<?php echo $row['Title']; ?>">Edit</a>
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