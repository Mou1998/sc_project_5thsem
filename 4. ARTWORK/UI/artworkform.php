<?php
session_start();
?>

<!DOCTYPE html>


<html>

    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artwork</title>
        <link href="style2.css" rel="stylesheet" />
    </head>

    <body>
    
        <div class="form-wrap">
        <?php
        if(isset($_POST["add"]))
        {
        ?>
        
            <form role="form" method="POST" action="artwork.php">
            
                <h1>Artwork</h1>
                <input type="text" placeholder="Artist Name" name="a_name" required>
                <input type="text" placeholder="Title" name="title" required>
                <input type="number" placeholder="Price" name="price" required>
                <input type="text" placeholder="Type" name="type" required>
                <input type="number" placeholder="Year of made" name="year_of_made" required>
                <input type="text" placeholder="Group Name" name="groupname" required>

                <input type="submit" class="btn btn-md btn-warning btn-block" name="add" value="Add+">
            
            </form>
            <?php
        }
        if(isset($_POST["edit"]))
        {
        ?>
        
        <form role="form" method="POST" action="artwork.php">
            
            <h1>Artwork</h1>
            <input type="text" placeholder="Title" name="title" required>
            <input type="number" placeholder="Price" name="price" required>
            <input type="text" placeholder="Group Name" name="groupname" required>

            <input type="submit" class="btn btn-md btn-warning btn-block" name="edit" value="Edit">
        
        </form>
        <?php
        }
        ?>
        
        </div>
    
    
    
    </body>



</html>
