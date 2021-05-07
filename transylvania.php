<?php session_start();
include('function.php');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Hotel transylvania</title>
  </head>

  <header>    
    <?php include('header.php') ?>
  </header>

  <body class='hotelBody'>
<!-- Main image and title -->
    <div class="modelContainer">
        <section class="titleImage">
          <img  src="assets/images/transylvania/hotel_transylvania.jpg" alt='dracula, frankenstein, wolf man, mummy and invisble man standing in from of hotel transylvania'>
        </section>
        <section class='titleTextBoxShadow'>   
        </section>
        <section class='titleTextBox'>
          <h2>Hotel Transylvania</h2>  
        </section>    
    </div>
    <br>

    <div class="about">
      <div class="aboutText">
        <h1>About Hotel Transylvania</h1>
        <p>A plaza hotel where monsters can relax and get away from humans due to fear of persecution. As part
          of the package we are including a custom that will help you blend in, don't remove this unless your
          are venturing out of the hotel.
          The surronding area is full historical architechure including Saxon walls and bastions, as well as expansive Council Square, 
        ringed by colorful baroque buildings, the towering Gothic Black Church and cafes. 
        Should you venture out we highly recomend you remove your customes, unless you enjoy being chased by pitch forks and torches.</p>
      </div>
      <div class="activitieContainer">
        <h2>Activities</h2>
        <p>Hotel Transylvania offers an array of life activies, including - </p>   
        <?php $transylaviaActivities->getActivities(); ?>
      </div>
    </div>

  </body>

  <footer>
    <?php include("footer.php") ?>
  </footer>

  </body>

  <script src="script/menu.js" type="text/javascript"></script>

</html>