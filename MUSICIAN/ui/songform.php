<?php
session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Song</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
    
        <div class="form-wrap">

            <?php
            if(isset($_POST["add"]))
            {
            ?>
            
                    <form role="form" method="POST" action="song.php">
            
                    <h1>Song Record</h1>
                
                    <input type="text" placeholder="Song Title" name="title" required>
                    <input type="text" placeholder="Author" name="author" required>
                    <input type="number" placeholder="Album ID" name="album" required>
                    <input type="text" placeholder="Musician SSN" name="ssn" required>

                    <input type="submit" class="btn btn-md btn-warning btn-block" name="add" value="Add+">

                </form>
                <?php
                }
                if(isset($_POST["edit"]))
                {
                ?>
                    <form role="form" method="POST" action="song.php">
            
                    <h1>Song Record</h1>
        
                    <input type="text" placeholder="Song Title" name="title" required>  
                    <input type="text" placeholder=" Add Musician SSN" name="ssn" required>

                    <input type="submit" class="btn btn-md btn-warning btn-block" name="edit" value="Edit+">

                </form>
                <?php
                }
                ?>
        
        </div>
    
    </body>
    
</html>