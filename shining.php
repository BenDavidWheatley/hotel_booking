<?php session_start();
include('function.php');?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Overlook Hotel</title>
  </head>

  <header>    
    <?php include('header.php') ?>
  </header>
  
  <body class='hotelBody'>

<!-- Main image and title -->
    <div class="modelContainer">
      <section class="titleImage">
        <img  src="assets/images/shining/the_shining.jpeg" alt='The overlook hotel in the snow, with mountains and forest in the back'>
      </section>
      
      <section id="overlookLineShadow" class='titleTextBoxShadow'>   
      </section>
      <section id="overlookTextBox" class='titleTextBox'>
        <h2>The Overlook Hotel  </h2>  
      </section>    
    </div>
    <br>

    <div class="about">
      <div class="aboutText">
        <h1>About The Overlook Hotel</h1>
        <p>At the Overlook hotel, you will be greated by Jack Torrance, 
          an aspiring writer and recovering alcoholic who is the caretaker
          of the isolated historic Overlook Hotel in the Colorado Rockies. Wintering over with Jack are his wife,
          Wendy Torrance, and young son, Danny Torrance. Danny is gifted with "the shining", 
          psychic abilities that enable him to see into the hotel's horrific past. The hotel cook, Dick Hallorann, 
          also has this ability and is able to communicate with Danny telepathically. 
          The hotel had a previous winter caretaker who went insane and killed his family and himself.
          After a winter storm leaves the Torrances snowbound, Jack's sanity deteriorates due to the influence 
          of the supernatural forces that inhabit the hotel, placing his wife and son in danger.</p>
      </div>
      <div class='activitieContainer'>
        <h2>Activities</h2>
        <p>The Overlook Hotel offers activies, including - </p>    
        <?php $overlookActivities->getActivities();?>
      </div>
    </div>
  </body>

  <footer>
      <?php include("footer.php") ?>
  </footer>

  <script src="script/menu.js" type="text/javascript"></script>

</html>