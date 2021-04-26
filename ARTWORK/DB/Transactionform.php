<?php
session_start();
?>
<?php
include("dbcon.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title><!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="style4.css" rel="stylesheet" />
</head>
<body>
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="content-table" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
							<?php
							$sql = "SELECT id, c_name, c_address FROM customer" ;
							$fire = mysqli_query($dbcon,$sql);
							while ($result = mysqli_fetch_assoc($fire)){
							?>
							<tr>
								<td><?php echo $result['id']; ?></td>
								<td><?php echo $result['c_name']; ?></td>
								<td><?php echo $result['c_address']; ?></td>                                      
							</tr>                                
						<?php
						}
						?>
					
					</tbody>
			</table>
		</div>
	</div>
	<form role="form" method="POST" action="Transaction.php">
		<div class="form-wrap">
					<h3>Service Name:</h3>
				    <select name="title">
				      <option value="">--Select Artwork--</option>
				      <?php $sql = "SELECT title FROM artwork WHERE txn_id IS NULL";
							$result = mysqli_query($dbcon,$sql);
							while ($row = $result->fetch_array()) {
				    			echo "<option value='" . $row["title"] . "'>" . $row["title"] . "</option>";
							} ?>
				    </select>
					<br>
					<br>
					<input name="c_id" placeholder="id" type="number">
					<button type="submit" class="button"> Add Transaction</button>
		</div>
	</form>
	</br>
	<div>
	</div>	
	</div>
</body>