<?php
    include("dbcon.php");
    if (!$dbcon) {
        echo "connection Error";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index_page_styling.css">
    <title>Index</title>
</head>
<body>
<h2 class="heading">Artwork Managment System</h2>

<div class="slider">
  <img class="mySlides" src="1.jpg" style="width:100%">
  <img class="mySlides" src="2.jpg" style="width:100%">
  <img class="mySlides" src="3.jpg" style="width:100%">
  <img class="mySlides" src="3.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); 
}
</script>
<div class="container">
    <form action="artistform.php" method="POST">
        <h3>ARTIST DETAILS</h3>
        <button class="button" name="add" type="submit">Add Artist</button>
        <button class="button" name="edit" type="submit">Edit Artist</button>
        <button class="button" name="delete" type="submit">Delete Artist</button>
    </form>
  
    <form action="artworkform.php" method="POST">
        <h3>ARTWORK DETAILS</h3>
        <button class="button" name="add" type="submit">Add Artwork</button>
        <button class="button" name="edit" type="submit">Edit Artwork</button>  
     </form>
   
     <form method="POST" action="Transaction.php">
    <h3>Transaction</h3>
    <button class="button" type="submit">Transaction</button>
    </form>
         <form action="Customerform.html" method="POST">
        <h3>Customer</h3>
        <button class="button" name="add" type="submit">Add Customer</button>
        <button class="button" name="edit" type="submit">Edit Customer</button>  
    </form>
 
    <form action="r.php" method="POST">
    <h3>Report</h3>
    <button class="button"  type="submit">Generate Report</button>
    </form>
    </div>
    <form action="logout.php" method="POST">
    <button  class="button" type="submit" style="text-align:centre">LOG OUT</button>  
    </form>
</body>
</html>