<?php session_start();
include('function.php');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>The Grand Budapest</title>
  </head>

  <header>    
    <?php include('header.php') ?>
  </header>

  <body class='hotelBody'>
    <!-- Main image and title -->
    <div class="modelContainer">
        <section class="titleImage">
            <img  src="assets/images/grand_budapest/budapest.jpeg" alt='The grand budapest hotel with a pink overlay color'>
            </section>            
            <section class='titleTextBoxShadow'>   
            </section>
            <section class='titleTextBox'>
            <h2>The Grand Budapest Hotel</h2>  
        </section>    
    </div>
    <br>
    <div class="about">
      <div class="aboutText">
        <h1>About the Grand Budapest</h1>
        <p>The Grand Budapest Hotel, a popular European ski resort In the 1930s, presided over by concierge Gustave H. 
          Gustave prides himself on providing first-class service to the hotel's guests.
          When one of Gustave's lovers dies mysteriously, Gustave finds himself the recipient of a 
          priceless painting and the chief suspect in her murder.</p>
      </div>
      <div class='activitieContainer'>
          <h2>Activities</h2>
          <p>The Grand Budapest Hotel offers activies, including - </p>    
          <?php $budapestActivities->getActivities(); ?>
      </div>
    </div>
  </body>

  <footer>
    <?php include("footer.php") ?>
  </footer>
  
  <script src="script/menu.js" type="text/javascript"></script>

</html>