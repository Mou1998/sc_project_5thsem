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
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Type of Artwork', 'Total Amount Sold'],
          <?php
          $form_date=$_POST['form_date'];
          $to_date=$_POST['to_date'];
          $sql = "SELECT a."."type, SUM(a.price) FROM artwork a WHERE a.txn_id IS NOT null GROUP BY a.type" ;
          $fire = mysqli_query($dbcon,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['type']."',".$result['SUM(a.price)']."],";
          }
         ?>
        ]);

        var options = {
          width: 800,
          chart: {
            title: 'Type of art Sold',
            subtitle: 'Type of Art vs total Sold'
          },
          backgroundColor: "transparent",
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'TotalAmount' }
          },
          axes: {
            x: {
              TotalAmount: {label: 'Total Amount Sold'}, // Bottom x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Producers', 'Produce Albums'],
         <?php
          $form_date=$_POST['form_date'];
          $to_date=$_POST['to_date'];
          $sql = "SELECT g_name, COUNT(a_title) FROM classify WHERE a_title IN ( SELECT title FROM artwork WHERE txn_id IN ( SELECT txn_id FROM transactions WHERE t_date BETWEEN '$form_date' AND '$to_date'))GROUP BY g_name" ;
          $fire = mysqli_query($dbcon,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['g_name']."',".$result['COUNT(a_title)']."],";
          }
         ?>
        ]);

        var options = {
          title:'NO. of sold ARTWORK in a group from <?php echo $form_date; ?> to <?php echo $to_date; ?>',
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
  
    <div>
        <h3 class="heading">  Report of ART Transaction from <?php $newDate = date("d-m-Y", strtotime($form_date));  echo $newDate; ?>
        to <?php $newDate = date("d-m-Y", strtotime($to_date));  echo $newDate; ?> </h3>
        
    </div>
    <div class="row">
        <div class="col-md-6">
          
          <div class="form-wrap">
            <form role="form" method="POST" action="r.php">
            <label for="formGroupExampleInput" class="form-label">ART GALLERY REPORT</label>
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
                  <th>TYPE</th>
                  <th>TITLE</th>
                  <th>PRICE</th>
                  <th>Txn ID</th>
                  <th>Txn Date</th>
                  <th>Customer ID</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                    $sql = "SELECT type, title, price, a."."txn_id, t_date, c_id FROM artwork a, transactions t WHERE t.txn_id=a.txn_id AND t_date BETWEEN '$form_date' and '$to_date' ORDER BY type ASC, price DESC";
                    $fire = mysqli_query($dbcon,$sql);
                    while ($result = mysqli_fetch_assoc($fire)){
                    ?>
                    <tr>
                      <td><?php echo $result['type']; ?></td>
                      <td><?php echo $result['title']; ?></td>
                      <td><?php echo $result['price']; ?></td> 
                      <td><?php echo $result['txn_id']; ?></td>
                      <td><?php echo $result['t_date']; ?></td>
                      <td><?php echo $result['c_id']; ?></td>                               
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
      <div class="pie" id="piechart"></div>
      <div class="bar" id="dual_x_div"></div>
    </div>
      <a href="home.php" class="btn btn-primary btn-lg" role="button" data-bs-toggle="button">Go Back to Home</a>
<br><hr>
    
<?php
}
else { ?>
      <div class="form-wrap2">
        <form role="form" method="POST" action="r.php">
          <input type="date" placeholder="form_date" name="form_date" required>
          <input type="date" placeholder="to_date" name="to_date" required>
          <input type="submit" class="button-generate" name="genarate" value="Genarate">
        </form>
      </div>
      <a href="dashboard.php" class="btn btn-primary btn-lg" role="button" data-bs-toggle="button">Go Back to Home</a>

                  
      
      
<?php
} 
?>


    
</div>
  
</body>
</html>
