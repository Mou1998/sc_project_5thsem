<?php 
include 'nav.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <title>Index</title>
  <link href="style.css" rel="stylesheet" />
</head>

<body>
  <div class="bg-cover">
    <h1 class="heading">Album Managment System</h1>
    <form action="musicianform.php" method="POST">
      <h3 class="sub-heading">MUSICIAN DETAILS</h3>
      <section class="musician">
        <button class="button" type="submit" name="add">Add Musician</button>

        <button class="button" type="submit" name="edit">Edit Musician</button>

        <button class="button" type="submit" name="delete">Delete Musician</button>
      </section>
    </form>
    <!-- <hr class="rounded"> -->
    <br>
    <form action="addalbum.php" method="POST">
      <h3 class="sub-heading">ALBUM DETAILS</h3>
      <section class="album">
        <button class="button" name="add" type="submit">Add Album</button>
        <!-- <button action="" type="submit">Edit Album</button> -->
        <!-- <button action="" type="submit">Delete Album</button> -->
      </section>
    </form>
    <!-- <hr class="rounded"> -->
    <br>
    <form action="songform.php" method="POST">
      <h3 class="sub-heading">SONG DETAILS</h3>
      <section class="song">
        <button class="button" name="add" type="submit">Add Song</button>
        <button class="button" name="edit" type="submit">Edit Song details</button>
        <!-- <button action="" type="submit">Delete Song</button> -->
      </section>
    </form>
    <br>
    <!-- <hr class="rounded"> -->
    <section class="report">
      <form action="report1.php" method="POST">
        <button class="button" type="submit">Generate Report1</button>
      </form>
      <br>
      <form action="report2.php" method="POST">
        <button class="button" type="submit">Generate Report2</button>
      </form>
      <br>
      <a href="logout.php" class="btn btn-dark btn-lg" role="button" data-bs-toggle="button">Log Out</a>
      <hr>
    </section>
    

  </div>

<?php
include 'function.php';
?>
