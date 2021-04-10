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
  
  <body id='mainBody'>

<!-- Main image and title -->
    <div class="modelContainer">
      <section class="titleImage">
        <img  src="assets/images/shining/the_shining.jpeg">
      </section>
      <section class="topTitleLine">
        <div></div>
      </section>
      <section class='titleTextBoxShadow'>   
      </section>
      <section class='titleTextBox'>
        <p>THE OVERLOOK HOTEL</p>  
      </section>    
    </div>
    <br>

    <div class="about">
      <h3>About The Overlook Hotel</h3>
      <p>The Shining is a 1980 psychological horror film produced and directed by Stanley Kubrick and co-written with novelist Diane Johnson. The film is based on Stephen King's 1977 novel of the same name and stars Jack Nicholson, Shelley Duvall, Scatman Crothers, and Danny Lloyd.

  The film's central character is Jack Torrance (Nicholson), an aspiring writer and recovering alcoholic who accepts a position as the off-season caretaker of the isolated historic Overlook Hotel in the Colorado Rockies. Wintering over with Jack are his wife, Wendy Torrance (Duvall), and young son, Danny Torrance (Lloyd). Danny is gifted with "the shining", psychic abilities that enable him to see into the hotel's horrific past. The hotel cook, Dick Hallorann (Crothers), also has this ability and is able to communicate with Danny telepathically. The hotel had a previous winter caretaker who went insane and killed his family and himself. After a winter storm leaves the Torrances snowbound, Jack's sanity deteriorates due to the influence of the supernatural forces that inhabit the hotel, placing his wife and son in danger.</p>

    </div>
  </body>

  <footer>
      <?php include("footer.php") ?>
  </footer>
</html>