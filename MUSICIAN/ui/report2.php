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
    <link href="style2.css" rel="stylesheet" />
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
          $sql="SELECT Ins_Name, COUNT(title) FROM plays p, performs per where p".".Ssn=per.Ssn and per.Title IN( SELECT title FROM songs WHERE A_Id IN( SELECT A_Id FROM albums WHERE Copyright_Date BETWEEN '$form_date' AND '$to_date')) GROUP by p.Ins_name";
          $fire = mysqli_query($dbcon,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Ins_Name']."',".$result['COUNT(title)']."],";
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
  
	<div class="form-wrap">
            
        <form role="form" method="POST" action="report2.php">
    
            <input type="date" placeholder="form_date" name="form_date" required>
            <input type="date" placeholder="to_date" name="to_date" required>
            

            <input type="submit" class="button-generate" name="genarate" value="Genarate">
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
	                <table class="content-table" id="example">
	                    <thead>
	                        <tr>
	                            <th>Instrument Name</th>
	                            <th>Song Title</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                                <?php
	                                $sql = "SELECT DiSTINCT(Ins_Name), title FROM plays p, performs per where p".".Ssn=per.Ssn and per.Title IN( SELECT title FROM songs WHERE A_Id IN( SELECT A_Id FROM albums WHERE Copyright_Date BETWEEN '$form_date' AND '$to_date')) ORDER BY `title` ASC" ;
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
        <br>
			<a href="index.html">go to home</a>
</body>
</html>
<style>
.split {
  height: 100%;
  width: 50%;
  position: static;
}
</style>