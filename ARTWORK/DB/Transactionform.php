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
    <link href="style2.css" rel="stylesheet" />
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
		<label class="col-md-4 control-label"> Service Name:</label>
	    <div class="col-md-4 selectContainer">
			    <div class="input-group">
			        <span class="input-group-addon"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></span>
				    <select name="title" class="form-control selectpicker">
				      <option value="">--Select Artwork--</option>
				      <?php $sql = "SELECT title FROM artwork WHERE txn_id IS NULL";
							$result = mysqli_query($dbcon,$sql);
							while ($row = $result->fetch_array()) {
				    			echo "<option value='" . $row["title"] . "'>" . $row["title"] . "</option>";
							} ?>
				    </select>
			  </div>
		</div>
		<div class="col-md-4 selectContainer">
			    <div class="input-group">
			        <div class="form-group">
					  <label class="col-md-8 control-label" >ID</label> 
					    <div class="col-md-8 inputGroupContainer">
						    <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
							  <input name="c_id" placeholder="id" class="form-control"  type="number">
						    </div>
					  </div>
					</div>
			  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-6 control-label"></label>
		  <div class="col-md-4"><br>
		    	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAdd Transaction  <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
		  </div>
		</div>
	</form>
	</br>
	<div>
		
	</div>
</body>