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
    <title>Report</title>
    <link href="style.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Instrument', 'no_of_songs'],
         <?php
          $form_date=$_POST['form_date'];
          $to_date=$_POST['to_date'];
          $sql="SELECT Ins_Name, COUNT(DISTINCT title) FROM plays p, performs per where p".".Ssn=per.Ssn and per.Title IN( SELECT title FROM songs WHERE A_Id IN( SELECT A_Id FROM albums WHERE Copyright_Date BETWEEN '$form_date' AND '$to_date')) GROUP by p.Ins_name";
          $fire = mysqli_query($dbcon,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Ins_Name']."',".$result['COUNT(DISTINCT title)']."],";
          }
         ?>
        ]);

        var options = {
          title: 'Producers produces their albums <?php echo $form_date; ?> to <?php echo $to_date; ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
	<div class="col-md-3">
            
        <form role="form" method="POST" action="report2.php">
    
            <h1>Album Record</h1>
            <input type="date" placeholder="form_date" name="form_date" required>
            <input type="date" placeholder="to_date" name="to_date" required>
            

            <input type="submit" class="btn btn-md btn-warning btn-block" name="genarate" value="Genarate">
		</form>
    </div>
    <?php
    	if (isset($_POST['genarate'])) {?>
    		<div id="page-wrapper">
    			<div class="alert alert-default" style="color:white;background-color:#008CBA">
	                <center>
	                    <h3> <span class="glyphicon glyphicon-list-alt"></span> report of Albums from <?php $newDate = date("d-m-Y", strtotime($form_date));  echo $newDate; ?>
	                    to <?php $newDate = date("d-m-Y", strtotime($to_date));  echo $newDate; ?> </h3>
	                </center>
	            </div><br />
	    		<div class="table-responsive">
	                <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
	                    <thead>
	                        <tr>
	                            <th>Instrument Name</th>
	                            <th>Song Title</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                                <?php
	                                $sql = "SELECT DISTINCT Ins_Name, title FROM plays p, performs per where p".".Ssn=per.Ssn and per.Title IN( SELECT title FROM songs WHERE A_Id IN( SELECT A_Id FROM albums WHERE Copyright_Date BETWEEN '$form_date' AND '$to_date')) ORDER BY `Ins_Name` ASC" ;
	          						$fire = mysqli_query($dbcon,$sql);
	          						while ($result = mysqli_fetch_assoc($fire)){
	                                ?>
	                                <tr>
	                                    <td><?php echo $result['Ins_Name']; ?></td>
	                                    <td><?php echo $result['title']; ?></td>                                    
	                                </tr>                                
	                            <?php
	                            }
	                            ?>
	                        <?php
	                        }
	                        ?>
	                        </tbody>
	                </table>
            	</div>
            </div>
            <br>
    		<div id="piechart"></div>
    		<br>
</body>
</html>
<style>
.split {
  height: 100%;
  width: 50%;
  position: static;
}
</style>