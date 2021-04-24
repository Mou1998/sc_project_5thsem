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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Producers', 'Produce Albums'],
         <?php
          $form_date=$_POST['form_date'];
          $to_date=$_POST['to_date'];
          $sql = "SELECT a".".SSn,m".".Name, COUNT(*) FROM albums a, musicians m WHERE a.SSn=m.Ssn and a.Copyright_Date BETWEEN '$form_date' and '$to_date' GROUP BY a.SSn" ;
          $fire = mysqli_query($dbcon,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Name']."',".$result['COUNT(*)']."],";
          }
         ?>
        ]);

        var options = {
          title:'Producers produces their albums <?php echo $form_date; ?> to <?php echo $to_date; ?>',
		  is3D: true, backgroundColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
<div class="container">

<?php
	if (isset($_POST['genarate'])) {?>
	
		<div class="row">
				<h3 class="heading">  Report of Albums from <?php $newDate = date("d-m-Y", strtotime($form_date));  echo $newDate; ?>
				to <?php $newDate = date("d-m-Y", strtotime($to_date));  echo $newDate; ?> </h3>
				
		</div>
		<div class="row">
				<div class="col-md-6">
					
					<div class="form-wrap">
						<form role="form" method="POST" action="report1.php">
							<input type="date" placeholder="form_date" name="form_date" required>
							<input type="date" placeholder="to_date" name="to_date" required>
							<input type="submit" class="button-generate" name="genarate" value="Genarate">
						</form>
					</div>
				</div>

				<div class="col-md-6">
					<div class="table-responsive">
						<table class="content-table" id="example">
							<thead>
								<tr>
									<th>PID</th>
									<th>P_Name</th>
									<th>Album_Name</th>
									<th>Copyright Date</th>
								</tr>
							</thead>
							<tbody>
										<?php
										$sql = "SELECT a".".SSn,m".".Name,a".".A_Name,a".".Copyright_Date FROM albums a, musicians m WHERE a.SSn=m.Ssn and a.Copyright_Date BETWEEN '$form_date' and '$to_date' ORDER BY a.SSn,a.A_Name ASC" ;
										$fire = mysqli_query($dbcon,$sql);
										while ($result = mysqli_fetch_assoc($fire)){
										?>
										<tr>
											<td><?php echo $result['SSn']; ?></td>
											<td><?php echo $result['Name']; ?></td>
											<td><?php echo $result['A_Name']; ?></td>
											<td><?php $newDate = date("d-m-Y", strtotime($result['Copyright_Date']));  echo $newDate; ?> </td>                                      
										</tr>                                
									<?php
									}
									?>
								
								</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="row">
			<div id="piechart" style="width: 1200px; height: 800px; bgcolour: transparent"></div>
			<br>
			<a href="index.html" class="btn btn-primary btn-lg" role="button" data-bs-toggle="button">Go Back to Home</a>
<br><hr>
		</div>
		
<?php
}
else { ?>
			<div class="form-wrap2">
				<form role="form" method="POST" action="report1.php">
					<input type="date" placeholder="form_date" name="form_date" required>
					<input type="date" placeholder="to_date" name="to_date" required>
					<input type="submit" class="button-generate" name="genarate" value="Genarate">
				</form>
			</div>
			<a href="index.html" class="btn btn-primary btn-lg" role="button" data-bs-toggle="button">Go Back to Home</a>

									
			
			
<?php
} 
?>


		
</div>
	
</body>
</html>
