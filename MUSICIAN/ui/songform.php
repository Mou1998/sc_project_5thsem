<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Song</title>
        <link href="style2.css" rel="stylesheet" />
    </head>

    <body>
    
        <div class="form-wrap2">

            <?php
            if(isset($_POST["add"]))
            {
            ?>
            
                    <form role="form" method="POST" action="song.php">
            
                    <h1>Song Record</h1>
                
                    <input type="text" class="form-control" placeholder="Song Title" name="title" required>
                    <input type="text" class="form-control" placeholder="Author" name="author" required>
                    <input type="number" class="form-control" placeholder="Album ID" name="album" required>
                    <input type="text" class="form-control" placeholder="Musician SSN" name="ssn" required>

                    <input type="submit" class="button-generate" name="add" value="ADD NOW">

                </form>
                <?php
                }
                if(isset($_POST["edit"]))
                {
                ?>
                    <form role="form" method="POST" action="song.php">
            
                    <h1>Song Record</h1>
        
                    <input type="text" class="form-control" placeholder="Song Title" name="title" required>  
                    <input type="text" class="form-control" placeholder=" Add Musician SSN" name="ssn" required>

                    <input type="submit" class="button-generate" name="edit" value="UPDATE">

                </form>
                <?php
                }
                ?>
        
        </div>
    
    </body>
    
</html>
<?php
include 'function.php';
?>