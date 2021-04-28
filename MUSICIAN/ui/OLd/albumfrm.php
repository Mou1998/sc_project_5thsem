<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Album</title>
          <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
        <link href="style2.css" rel="stylesheet" />
    </head>

    <body>
    
        <div class="form-wrap2">
            
            <form role="form" method="POST" action="album.php">
        
                <h1>Album Record</h1>
                <input type="text" class="form-control" placeholder="Album Name" name="a_name" required>
                <input type="date" class="form-control" placeholder="Copyright Date" name="copyright" required>
                <input type="text" class="form-control" placeholder="Album Format" name="format" required>
                <input type="number" class="form-control" placeholder="Producer ID" name="producer" required>
                <input type="submit" class="button-generate" name="add" value="ADD NOW">

            </form>
        
        </div>
    
    </body>
    
</html>
<?php
include 'function.php';
?>