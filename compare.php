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

  <body>
    <div id="selectedInformation">
        <p>Thank you <?php echo $newBooking->getName() ; ?> for choosing <?php echo $newBooking->getHotel(); ?></p>
        <h4>Dates</h4>
        <p>checkin for the - <?php echo $newBooking->getCheckIn(); ?></p>
        <p>checkout on the - <?php echo $newBooking->getCheckOut(); ?></p>
        <p>total number of days - <?php echo $newBooking->getNumberOfDays();    ?></p>
        <h4>Number of guests</h4>
        <p><?php echo $newBooking->getNumOfAdults(); ?> adults and <?php echo $newBooking->getNumOfChildren(); ?> children</p>
        <p>Below is more information about <?php echo $newBooking->getHotel(); ?> with comparisons to some more in the local area.</p>
    </div>
    <a href="index.php"><button value="back">Back to selection</button></a>

    <!-- initial hotel that was picked -->

    <div id="hotelContainer">       
        <section id="selectedHotel">
            <?php
                $selectedHotel = $_SESSION['hotels'];
                echo $selectedHotel; 
                if ($selectedHotel === 'Gorgoroth Hotel') {
                    ?>
                    <img class="selectedHotelImage" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg"> 
                    <p>Total cost R<?php echo $newBooking->getTotalCost()?></p>
                    <a href="gorgoroth.php" target="_blank"><button>More Information</button></a>
                <?php } else if ($selectedHotel === 'The Overlook Hotel') {
                    ?>
                    <img class="selectedHotelImage" value="two" src="assets/images/shining/the_shining.jpeg">
                    <p>Total cost R<?php echo $newBooking->getTotalCost()?></p>
                    <a href='shining.php' target="_blank"><button>More Information</button></a>
                <?php } else if ($selectedHotel === 'Grand Budapest Hotel') {
                    ?>
                    <img class="selectedHotelImage" value="three" src="assets/images/grand_budapest/budapest.jpeg">
                    <p>Total cost R<?php echo $newBooking->getTotalCost()?></p>
                    <a href='budapest.php' target="_blank"><button>More Information</button></a>
                <?php } else {
                    ?>
                    <img class="selectedHotelImage" value="four" src="assets/images/transylvania/hotel_transylvania.jpg">
                    <p>Total cost R<?php echo $newBooking->getTotalCost()?></p>
                    <a href='transylvania.php' target="_blank"><button>More Information</button></a>
                <?php
                } ?>
                <a href='booknow.php' target='_blank'><input type="submit" value="confirm booking"></input></a>
        </section>

        <!-- First hotel compared -->

        <section id="comparedOne">
            <?php if ($selectedHotel === "Gorgoroth Hotel" || $selectedHotel ===  "The Overlook Hotel" || $selectedHotel === "Grand Budapest Hotel") {
                ?> 
                <img class="firstCompared" value="four" src="assets/images/transylvania/hotel_transylvania.jpg"> 
                <p>For the same dates you could pay R<?php echo $newBooking->getTransCompare(); ?> at the Transylvania Hotel</p>
                <a href='transylvania.php' target='_blank'><button>More Information</button></a>
                <form action="booknow.php" method="post">
                <a href='booknow.php' target='_blank'><input type="submit" value="book now" name="hotelTrans"></input></a>
                </form>
            <?php } else {
                ?> <img class="firstCompared" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg"> 
                <p>For the same dates you could pay R<?php echo $newBooking->getGorgorothCompare();?> at the Gorgoroth Hotel</p>
                <a href='gorgoroth.php' target='_blank'><button>More Information</button></a>
                <form action="booknow.php" method="post">
                <a href='booknow.php' target='_blank'><input type="submit" value="book now" name="gorgorothHotel"></input></a>
                </form>
            <?php } ?>         
        </section>

        <!-- second hotel compared -->
            
        <section id="comparedTwo">  
            <?php if ($selectedHotel === "Gorgoroth Hotel" || $selectedHotel ===  "The Overlook Hotel" || $selectedHotel === "Hotel Transylvania") {  
                ?> <img class="secondCompare" value="three" src="assets/images/grand_budapest/budapest.jpeg">
                <p>For the same dates you could pay R<?php echo $newBooking->getBudapestCompare(); ?> at The Grand Budapest Hotel</p>
                <a href='budapest.php' target='_blank'><button>More Information</button></a>
                <a href='booknow.php' target='_blank'><input type="submit" value="book now" name="budapestHotel"></input></a>
            <?php } else {
                ?> <img class="secondCompare" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg">
                <p>For the same dates you could pay R<?php echo $newBooking->getGorgorothCompare(); ?> at the Gorgoroth Hotel</p>
                <a href='gorgoroth.php' target='_blank'><button>More Information</button></a>
                <a href='booknow.php' target='_blank'><input type="submit" value="book now" name="gorgorothHotel"></input></a>
            <?php } ?>
        </section>

        <!-- third hotel compared -->        

        <section id="comparedThree">
            <?php if ($selectedHotel === "Gorgoroth Hotel" || $selectedHotel ===  "Grand Budapest Hotel" || $selectedHotel === "Hotel Transylvania") {  
                ?> <img class="thirdCompare" value="two" src="assets/images/shining/the_shining.jpeg">
                <p>For the same dates you could pay R<?php  echo $newBooking->getOverlookCompare(); ?> at the Overlook Hotel</p>
                <a href='shining.php' target='_blank'><button>More Information</button></a>
                <a href='booknow.php' target='_blank'><input type="submit" value="book now" name="OverlookHotel"></input></a>
            <?php } else {
                ?> <img class="thirdCompare" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg">
                <p>For the same dates you could pay R<?php echo $newBooking->getGorgorothCompare();?> at the Gorgoroth Hotel</p>
                <a href='gorgoroth.php' target='_blank'><button>More Information</button></a>
                <a href='booknow.php' target='_blank'><input type="submit" value="book now" name="gorgorothHotel"></input></a>
            <?php } ?>

        </section>
    </div>

  </body>

  <footer>
    <?php include("footer.php") ?>
  </footer>


</html>