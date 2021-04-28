<?php
session_start();
?>


<!DOCTYPE html>


<html>

    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artist</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
    
        <div class="form-wrap">

        <?php
        if(isset($_POST["add"]))
        {
        ?>
        
            <form role="form" method="POST" action="artist.php">
            
                <h1>Artist</h1>
                <input type="text" placeholder="Artist Name" name="a_name" required>
                <input type="date" placeholder="Date of Birth" name="dob" required>
                <input type="text" placeholder="Address" name="address" required>
                <input type="text" placeholder="Style of Art" name="style" required>

                <input type="submit" class="btn btn-md btn-warning btn-block" name="add" value="Add+">
            
            </form>

            <?php
            }

            if(isset($_POST['edit']))
            {
            ?>
            <form role="form" method="POST" action="artist.php">
            
            <h1>Artist</h1>
            <input type="text" placeholder="Artist Name" name="a_name" required>
            <input type="text" placeholder="Address" name="address" required>

            <input type="submit" class="btn btn-md btn-warning btn-block" name="edit" value="Edit">
        
        </form>

        <?php
        }

        if(isset($_POST['delete']))
        {
        ?>
        <form role="form" method="POST" action="artist.php">
            
            <h1>Artist</h1>
            <input type="text" placeholder="Artist Name" name="a_name" required>

            <input type="submit" class="btn btn-md btn-warning btn-block" name="delete" value="Delete">
        
        </form>

        <?php
        }
        ?>
        
        </div>
    
    
    
    </body>



</html>
