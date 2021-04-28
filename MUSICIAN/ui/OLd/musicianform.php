<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Musician</title>
        <link href="style2.css" rel="stylesheet" />
    </head>

    <body>
    
        <div class="form-wrap2">
            <?php
            if(isset($_POST["add"]))
            {
            ?>
                <form role="form" method="POST" action="musician.php">
            
                <label for="formGroupExampleInput" class="form-label">Musician Record</label>
                    <input type="text" class="form-control" placeholder="Musician Full Name" name="m_name" required>
                    <input type="number" class="form-control" placeholder="Phone Number" name="ph" required>
                    <input type="text" class="form-control" placeholder="Full Address" name="address" required>
                    <input type="text" class="form-control" placeholder="Instruments plays" name="instrument" required>


                    <input type="submit" class="button-generate" name="add" value="ADD NOW">

                </form>
                        
                        
            <?php
            }

            if(isset($_POST['edit']))
            {
            ?>
                <form role="form" method="POST" action="musician.php">
                        
                    <h1>Musician Record</h1>
                    <input type="number" class="form-control" placeholder="Musician ID" name="m_id" required>
                    <input type="text" class="form-control" placeholder="Musician Full Name" name="m_name" required>
                    <input type="number" class="form-control" placeholder="Phone Number" name="ph" required>
                    <input type="text" class="form-control" placeholder="Full Address" name="address" required>


                    <input type="submit" class="button-generate" name="edit" value="UPDATE">
                </form>
            <?php
            }
            if(isset($_POST['delete']))
            {
            ?>
                <form role="form" method="POST" action="musician.php">
                        
                    <h1>Musician Record</h1>
                    <input type="number" class="form-control" placeholder="Musician ID" name="m_id" required>
                    
                    <input type="submit" class="button-generate" name="delete" value="DELETE">
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