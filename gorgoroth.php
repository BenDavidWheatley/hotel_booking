<?php session_start();
include('function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel='stylesheet' href='style/style.css' type='text/css'>
    <title>Hotel Gorgoroth</title>
  </head>

  <header>    
    <?php include('header.php') ?>
  </header>

  <body class='hotelBody'>

    <!-- Main image and title -->
  
    <div class="modelContainer">
      <section class="titleImage">
        <img  src="assets/images/gorgoroth/gorgoroth_hotel.jpg" alt='ork standing on a mountain with gorgoroth in the background'>
      </section>
      
      <section class='titleTextBoxShadow'>   
      </section>
      <section class='titleTextBox'>
        <h2>Hotel Gorgoroth</h2>  
      </section>    
    </div>
    <br>

    <!-- About the hotel -->

      <div class="about">
        <div class="aboutText">
          <h1>About Hotel Gorgoroth</h1>
          <p>Complety inhospitable, the arid plateau that is Gorgoroth is situated at the core of Sauron's realm.          
          Located at its centre is the active volcano known as Mount Doom, a three day trek from the hotel.         
          Towards the north of Gorgoroth you can find the Ash mountains and the fortress that is Barad-dûr, where the ever watching eye of Sauron can be found.
          Should you wish to venture further a field, you could always jump on a Drake and fly to Nurn just south of Mordor or out to the deserts of Lithlad towrds the east.
          </p>
        </div>
        <div class="activitieContainer">     
          <h2>Activities - </h2>
          <p>Gorgoroth offers an array of life threatening activies, including - </p>   
          <?php $gorgorothActivities->getActivities();?>
        </div>

      </div>
    </div>

  </body>
  <footer>
    <?php include("footer.php") ?>
  </footer>

  <script src="script/menu.js" type="text/javascript"></script>
  
  </body>
</html>