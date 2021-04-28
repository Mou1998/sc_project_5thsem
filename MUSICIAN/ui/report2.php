<?php
include 'nav.php';
?>

<?php
include("dbcon.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
body {
   
    background-image: url("bg2.jpg");
    font-family: Source Sans Pro;
}

.button-generate {
    background-color: #009879;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}

.heading {
    font-family:  Source Sans Pro;
    color: #009879;
    text-align: center;
    margin-bottom: 5rem;
    margin-top: 5rem;
    /* background-color: whitesmoke; */
}

.form-wrap {
    width: 300px;
    background: #009879;
    padding: 40px 20px;
    box-sizing: border-box;
    border-radius: 5px 5px 5px 5px;
    margin-left: 15rem;
    margin-top: 3rem;

}

.form-wrap2 {
    width: 300px;
    background: #009879;
    padding: 40px 20px;
    box-sizing: border-box;
    border-radius: 5px 5px 0 0;
    margin-left: 35rem;
    margin-top: 5rem;
}

h1 {
    font-size: 16px;
    text-align: center;
    color: rgb(247, 243, 250);
    font-weight: normal;
}

input {
    width: 100%;
    background: rgb(195, 245, 129);;
    border: 3px solid rgb(84, 223, 119);
    border-radius: 3px;
    padding: 6px 15px;
    box-sizing: border-box;
    margin-bottom: 20px;
    font-size: 16px;
   
}

input[type="submit"] {
    background: #208102;
    border: 0;
    cursor: pointer;
   
}

input[type="submit"]:hover {
    background: #083103;
    transition: .6s;
}

.content-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
    background-color: green;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
    overflow: auto;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #b9d2ee;
}
.content-table tbody tr:nth-of-type(odd) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.table-responsive {
    width: 500px;
    height: 500px;
    overflow-y: auto;
    align-content: right;
    margin-left: 5rem;
}

.content-table th {
    position: sticky;
}
    </style>
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
          title: 'Producers produces their albums <?php echo $form_date; ?> to <?php echo $to_date; ?>',
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
              <h3 class="heading" > Report of Albums from <?php $newDate = date("d-m-Y", strtotime($form_date));  echo $newDate; ?>
              to <?php $newDate = date("d-m-Y", strtotime($to_date));  echo $newDate; ?> </h3>
	        </div>
	<div class="row">
				<div class="col-md-6">
          <div class="form-wrap">
            <form role="form" method="POST" action="report2.php">
            <label for="formGroupExampleInput" class="form-label">Album Record</label>
                <input type="date" placeholder="form_date" name="form_date" required>
                <input type="date" placeholder="to_date" name="to_date" required>
                <input type="submit" class="button-generate" name="genarate" value="Genarate">
            </form>
          </div>
        </div>

        <div class="col-md-6">
	    		<div class="table-responsive">
	                <table class="content-table" id="example" >
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
	                        
	                        </tbody>
	                </table>
          </div>
       </div>
</div>
<div class="row"> 
    		<div id="piechart"style="width: 1200px; height: 800px; bgcolour: transparent"></div>
    		<br>
        <div class="col-md-12 text-center">
        <a href="dashboard.php" class="btn btn-dark btn-lg" role="button" data-bs-toggle="button">Return to Home</a>
        </div>
         <hr>
         <br>
</div>
<?php
}
else { ?>
			<div class="form-wrap2">
				<form role="form" method="POST" action="report2.php">
         <label for="formGroupExampleInput" class="form-label">Album Record</label>
					<input type="date" placeholder="form_date" name="form_date" required>
					<input type="date" placeholder="to_date" name="to_date" required>
					<input type="submit" class="button-generate" name="genarate" value="Genarate">
          <div class="col-md-12 text-center">
          <a href="dashboard.php" class="btn btn-dark btn-lg" role="button" data-bs-toggle="button">Return to Home</a>
          </div>
				</form>

		
									
			
			
<?php
} 
?>
<?php
include 'function.php';
?>