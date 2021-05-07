<?php session_start();
include('function.php')?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Hotel Compare</title>
  </head>
  
  <header>    
    <?php include('header.php') ?>
  </header>

  <body id='comparedBody'>
    

    <!-- initial hotel that was picked -->

    <div id="hotelContainer">       
        <div class="comparedContainer" id="selectedHotel"> 
            <section>                      
                <?php 
                if ($_SESSION['hotels'] === 'Gorgoroth Hotel') {?>
                    <img value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg" alt='ork standing on a mountain with gorgoroth in the background'> 
                    <div class="chosenButtons"> 
                        <button class='buttons' onClick="window.location='gorgoroth.php';">More Information</button>
                        <button class='buttons' onClick="window.location='booknow.php';">Confirm Booking</button>
                        <button id='bottomButton' class='buttons' onClick="window.location='index.php';" value="back">Back to selection</button>
                    </div>
                <?php } else if ($_SESSION['hotels'] === 'The Overlook Hotel') {?>
                    <img value="two" src="assets/images/shining/the_shining.jpeg" alt='The overlook hotel in the snow, with mountains and forest in the back'>
                    <button class='buttons' onClick="window.location='shining.php';">More Information</button>
                    <button class='buttons' onClick="window.location='booknow.php';">Confirm Booking</button>
                    <button id='bottomButton' class='buttons' onClick="window.location='index.php';" value="back">Back to selection</button>
                <?php } else if ($_SESSION['hotels'] === 'Grand Budapest Hotel') {?>                   
                    <img value="three" src="assets/images/grand_budapest/budapest.jpeg" alt='The grand budapest hotel with a pink overlay color'> 
                    <div class="chosenButtons"> 
                        <button class='buttons' onClick="window.location='budapest.php';">More Information</button>
                        <button class='buttons' onClick="window.location='booknow.php';">Confirm Booking</button>
                        <button id='bottomButton' class='buttons' onClick="window.location='index.php';" value="back">Back to selection</button>
                    </div>
                <?php } else {?>
                    <img  value="four" src="assets/images/transylvania/hotel_transylvania.jpg" alt='dracula, frankenstein, wolf man, mummy and invisble man standing in from of hotel transylvania'>     
                    <div class="chosenButtons">         
                        <button class='buttons' onClick="window.location='transylvania.php';">More Information</button>
                        <button class='buttons' onClick="window.location='booknow.php';">Confirm Booking</button>
                        <button class='buttons' onClick="window.location='index.php';" value="back">Back to selection</button>
                    </div>  
                <?php } ?>
               
                
                
            </section>   
            <section id='chosenInfoContainer'>
                <h2>Thank you <span><?php $newBooking->getFullName() ; ?></span> for choosing - <br> <span><?php $newBooking->getHotel(); ?></span></h2>
                <br>
                <h3>Some of the activities you can enjoy are - </h3>
                <br>
                <br>
                <?php                    
                    if ($_SESSION['hotels'] === 'Gorgoroth Hotel') {
                        $gorgorothActivities->getActivities();
                    } else if ($_SESSION['hotels'] === 'The Overlook Hotel') {
                        $overlookActivities->getActivities();
                    } else if ($_SESSION['hotels'] === 'Grand Budapest Hotel'){
                        $budapestActivities->getActivities();
                    }  else {
                        $transylaviaActivities->getActivities();
                    } ?>
                <section id='chosenInfo'>
                    <p>Checkin for the - <span><?php $newBooking->getCheckIn(); ?></span></p>
                    <p>Checkout on the - <span><?php $newBooking->getCheckOut(); ?></span></p>
                    <p><span><?php $newBooking->getNumOfAdults(); ?></span> Adults and <span><?php $newBooking->getNumOfChildren(); ?></span> Children</p>
                    <p>Total number of days - <span><?php $newBooking->getNumberOfDays();?></span></p>
                    <p>Total cost <span>R<?php $newBooking->getTotalCost()?></span></p> 
                </section>               
            </section>
    
        </div>

        <!-- First hotel compared -->

        <secton id="comparedHeader">
            <h1>For the same dates you could pay - </h1>
        </secton>

        <section class="comparedContainer" id="comparedOne">
            <?php if ($_SESSION['hotels'] !== "Hotel Transylvania") { ?> 
                <img class="firstCompared" value="four" src="assets/images/transylvania/hotel_transylvania.jpg" alt='dracula, frankenstein, wolf man, mummy and invisble man standing in from of hotel transylvania'>
                <section class=comparedText>
                    <p><span>R<?php $newBooking->getTransCompare(); ?></span> at <span>Hotel Transylvania.</span></p>
                    <br>
                    <p>Activities include -</p>
                    <br>
                    <div class='listedActivities'>
                        <?php $transylaviaActivities->getActivities(); ?>
                    </div>
                    <div class='buttonContainer'>
                        <a href='transylvania.php' target='_blank'><button>More Information</button></a> 
                        <form action="booknow.php" method="post">
                            <input type="submit" value="Book now" name="hotelTrans"></input>
                        </form>
                    </div>
                </section>

                <?php } else {
                    include('gorgorothCompared.php');
                } ?>        
        </section>

        <!-- second hotel compared -->
            
        <section class="comparedContainer" id="comparedTwo">  
            <?php if ($_SESSION['hotels']  !== "Grand Budapest Hotel") { ?> 
                <img class="secondCompare" value="three" src="assets/images/grand_budapest/budapest.jpeg" alt='The grand budapest hotel with a pink overlay color'>
                <section class=comparedText>
                    <p><span>R<?php $newBooking->getBudapestCompare(); ?></span> at <span>The Grand Budapest Hotel</span></p>
                    <br>
                    <p>Activities include -</p>
                    <br>
                    <div class='listedActivities'>
                        <?php $budapestActivities->getActivities(); ?>
                    <div>
                    <div class='buttonContainer'>
                        <a href='budapest.php' target='_blank' ><button>More Information</button></a>
                        <form action="booknow.php" method="post">
                            <input type="submit" value="Book now" name="budapestHotel"></input>
                        </form>
                    </div>
                </section>
                <?php } else {
                    include('gorgorothCompared.php');
                } ?>
        </section>

        <!-- third hotel compared -->        

        <section class="comparedContainer" id="comparedThree">
            <?php if ($_SESSION['hotels']  !== "The Overlook Hotel") { ?> 
                <img class="thirdCompare" value="two" src="assets/images/shining/the_shining.jpeg" alt='The overlook hotel in the snow, with mountains and forest in the back'>
                <section class=comparedText>
                    <p><span>R<?php $newBooking->getOverlookCompare(); ?></span> at <span>The Overlook Hotel</span></p><p>
                    <br>
                    </p>Activities include -</p>
                    <br>
                    <div class='listedActivities'>
                        <?php $overlookActivities->getActivities(); ?>
                    </div>
                    <div class='buttonContainer'>
                        <a href='shining.php' target='_blank'><button>More Information</button></a>                      
                        <form action="booknow.php" method="post">
                            <input type="submit" value="Book now" name="overlookHotel"></input>
                        </form>
                    </div>
                </section>
                <?php } else {
                    include('gorgorothCompared.php');
                } ?>

        </section>
    </div>

  </body>

  <footer id="comparedFooter">
    <?php include("footer.php") ?>
  </footer> 

  <script src="script/script.js" type="text/javascript"></script>
  
</html>