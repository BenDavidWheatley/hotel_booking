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

  <header class='headerContainer'>
    <nav class="navigation">
      <a href="index.php"><p>Home</p></a>
      <a href="gorgoroth.php"><p>Hotel Gorgoroth</p></a>
      <a href="budapest.php"><p>Grand Budapest Hotel</p></a>
      <a href="shining.php"><p>The Overlook Hotel</p></a>
      <a href="transylvania.php"><p>Hotel Transylvania</p></a>
    </nav>
  </header>

  <body>
    <div id="selectedInformation">
        <p>Thank you <?php echo $_SESSION['name']; ?> for choosing <?php echo $_SESSION['hotels']; ?></p>
        <h4>Dates</h4>
        <p>checkin for the - <?php echo $_SESSION['startDate']; ?></p>
        <p>checkout on the - <?php echo $_SESSION['endDate']; ?></p>
        <p>total number of days - <?php echo $_SESSION['days'] ; ?></p>
        <h4>Number of guests</h4>
        <p><?php echo $_SESSION['adults']; ?> adults and <?php echo $_SESSION['children']; ?> children</p>
        <p>Below is more information about <?php echo  $_SESSION['hotels']; ?> with comparisons to some more in the local area.</p>
    </div>

    <div id="hotelContainer">       
        <section id="selectedHotel">
            <?php
                $selectedHotel = $_SESSION['hotels'];
                echo $selectedHotel; 
                if ($selectedHotel === 'Gorgoroth Hotel') {
                    ?>
                    <img class="selectedHotelImage" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg"> 
                    <p>Total cost R<?php echo $_SESSION['totalCost']?></p>
                    <a href="gorgoroth.php" target="_blank"><button>More Information</button></a><button>confirm booking</button>
                <?php } else if ($selectedHotel === 'The Overlook Hotel') {
                    ?>
                    <img class="selectedHotelImage" value="two" src="assets/images/shining/the_shining.jpeg">
                    <p>Total cost R<?php echo $_SESSION['totalCost']?></p>
                    <a href='shining.php' target="_blank"><button>More Information</button></a><button>confirm booking</button>
                <?php } else if ($selectedHotel === 'Grand Budapest Hotel') {
                    ?>
                    <img class="selectedHotelImage" value="three" src="assets/images/grand_budapest/budapest.jpeg">
                    <p>Total cost R<?php echo $_SESSION['totalCost']?></p>
                    <a href='budapest.php' target="_blank"><button>More Information</button></a><button>confirm booking</button>
                <?php } else {
                    ?>
                    <img class="selectedHotelImage" value="four" src="assets/images/transylvania/hotel_transylvania.jpg">
                    <p>Total cost R<?php echo $_SESSION['totalCost']?></p>
                    <a href='transylvania.php' target="_blank"><button>More Information</button></a>
                <?php
                } ?>
            
        </section>

        <section id="comparedOne">
            <?php if ($selectedHotel === "Gorgoroth Hotel" || $selectedHotel ===  "The Overlook Hotel" || $selectedHotel === "Grand Budapest Hotel") {
                ?> 
                <img class="firstCompared" value="four" src="assets/images/transylvania/hotel_transylvania.jpg"> 
                <p>For the same dates you could pay R<?php echo ((($_SESSION['adults'] * $_SESSION['transylvaniaAdultRate']) + ($_SESSION['children'] * $_SESSION['transylvaniaChildRate'])) * $_SESSION['days'])?></p>
                <a href='transylvania.php' target='_blank'><button>More Information</button></a><button>Book now</button>
            <?php } else {
                ?> <img class="firstCompared" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg"> 
                <p>For the same dates you could pay R<?php echo ((($_SESSION['adults'] * $_SESSION['gorgorothAdultRate']) + ($_SESSION['children'] * $_SESSION['gorgorothChildRate'])) * $_SESSION['days'])?></p>
                <a href='gorgoroth.php' target='_blank'><button>More Information</button></a><button>Book now</button>
            <?php } ?>
            
        </section>

        <section id="comparedTwo">  
            <?php if ($selectedHotel === "Gorgoroth Hotel" || $selectedHotel ===  "The Overlook Hotel" || $selectedHotel === "Hotel Transylvania") {  
                ?> <img class="secondCompare" value="three" src="assets/images/grand_budapest/budapest.jpeg">
                <p>For the same dates you could pay R<?php echo ((($_SESSION['adults'] * $_SESSION['budapestAdultRate']) + ($_SESSION['children'] * $_SESSION['budapestChildRate'])) * $_SESSION['days'])?></p>
                <a href='budapest.php' target='_blank'><button>More Information</button></a><button>Book now</button>
            <?php } else {
                ?> <img class="secondCompare" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg">
                <p>For the same dates you could pay R<?php echo ((($_SESSION['adults'] * $_SESSION['gorgorothAdultRate']) + ($_SESSION['children'] * $_SESSION['gorgorothChildRate'])) * $_SESSION['days'])?></p>
                <a href='gorgoroth.php' target='_blank'><button>More Information</button></a><button>Book now</button>
            <?php } ?>
        </section>

        <section id="comparedThree">
            <?php if ($selectedHotel === "Gorgoroth Hotel" || $selectedHotel ===  "Grand Budapest Hotel" || $selectedHotel === "Hotel Transylvania") {  
                ?> <img class="thirdCompare" value="two" src="assets/images/shining/the_shining.jpeg">
                <p>For the same dates you could pay R<?php echo ((($_SESSION['adults'] * $_SESSION['overlookAdultRate']) + ($_SESSION['children'] * $_SESSION['overlookDayChildRate'])) * $_SESSION['days'])?></p>
                <a href='shining.php' target='_blank'><button>More Information</button></a><button>Book now</button>
            <?php } else {
                ?> <img class="thirdCompare" value="one" src="assets/images/gorgoroth/gorgoroth_hotel.jpg">
                <p>For the same dates you could pay R<?php echo ((($_SESSION['adults'] * $_SESSION['gorgorothAdultRate']) + ($_SESSION['children'] * $_SESSION['gorgorothChildRate'])) * $_SESSION['days'])?></p>
                <a href='gorgoroth.php' target='_blank'><button>More Information</button></a><button>Book now</button>
            <?php } ?>

        </section>
    </div>

  </body>

  <footer class="footerContainer">
  </footer>


</html>