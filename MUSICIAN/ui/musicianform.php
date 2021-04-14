<?php
session_start();
?>
<?php
if(isset($_POST["add"]))
{
?>
    <!DOCTYPE html>
    <html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Musician</title>
            <link href="style.css" rel="stylesheet" />
        </head>

        <body>
        
            <div class="form-wrap">
                
                <form role="form" method="POST" action="musician.php">
            
                    <h1>Musician Record</h1>
                    <input type="text" placeholder="Musician Full Name" name="m_name" required>
                    <input type="number" placeholder="Phone Number" name="ph" required>
                    <input type="text" placeholder="Full Address" name="address" required>
                    <input type="text" placeholder="Instruments plays" name="instrument" required>


                    <input type="submit" class="btn btn-md btn-warning btn-block" name="add" value="Add+">

                </form>
            
            </div>
        
        </body>
        
    </html>
<?php
}

if(isset($_POST['edit']))
{
?>
    <!DOCTYPE html>
    <html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Musician</title>
            <link href="style.css" rel="stylesheet" />
        </head>

        <body>
        
            <div class="form-wrap">
                
                <form role="form" method="POST" action="musician.php">
            
                    <h1>Musician Record</h1>
                    <input type="number" placeholder="Musician ID" name="m_id" required>
                    <input type="text" placeholder="Musician Full Name" name="m_name" required>
                    <input type="number" placeholder="Phone Number" name="ph" required>
                    <input type="text" placeholder="Full Address" name="address" required>


                    <input type="submit" class="btn btn-md btn-warning btn-block" name="edit" value="Edit">

                </form>
            
            </div>
        
        </body>
        
    </html>
<?php
}
if(isset($_POST['delete']))
{
?>
<!DOCTYPE html>
    <html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Musician</title>
            <link href="style.css" rel="stylesheet" />
        </head>

        <body>
        
            <div class="form-wrap">
                
                <form role="form" method="POST" action="musician.php">
            
                    <h1>Musician Record</h1>
                    <input type="number" placeholder="Musician ID" name="m_id" required>
                    
                    <input type="submit" class="btn btn-md btn-warning btn-block" name="delete" value="Delete --">

                </form>
            
            </div>
        
        </body>
        
    </html>
<?php
}
?>
