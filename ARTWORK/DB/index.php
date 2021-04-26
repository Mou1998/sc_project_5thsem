<?php
    include("dbcon.php");
    if (!$dbcon) {
        echo "connection Error";
        exit();
    }
    else{?>
        <script type="text/javascript"> 
            alert('DBConnection Successfull'); 
        </script>;
    <?php }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    
    <form action="artistform.php" method="POST">
        <h3>ARTIST DETAILS</h3>
        <button name="add" type="submit">Add Artist</button>
        <button name="edit" type="submit">Edit Artist</button>
        <button name="delete" type="submit">Delete Artist</button>
    </form>
    <form action="artworkform.php" method="POST">
        <h3>ARTWORK DETAILS</h3>
        <button name="add" type="submit">Add Artwork</button>
        <button name="edit" type="submit">Edit Artwork</button>  
     </form>
     <form action="Customerform.html" method="POST">
        <h3>Customer</h3>
        <button name="add" type="submit">Add Customer</button>
        <button name="edit" type="submit">Edit Customer</button>  
     </form>
    <br><br><br>
    <button  type="submit">Generate Report</button>
    <br><br><br>
    <button  type="submit">LOG OUT</button>  
</body>
</html>