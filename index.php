<?php session_start();
require('function.php')?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Hotel Compare</title>
  </head>

  <header>
    <?php include('header.php')?>
  </header>
  
  <body class='body'>   
    <div class="bookingContainer">
      <div id="mainBanner">
        <div id='mainHeading'>
          <img id='logo' src="assets/images/logo/logo_transparent.png" alt='green company logo for hotel compare'>
          <h1>Compare</h1>
          <p>For those with a more adventurous side.</p>
        </div>
      </div>
      
      <div id=formContainer>
        <form id="form"  action="index.php" method="post">
          <h2>Make a booking</h2>
          <label for="name">Name</label>
          <input type="text" id="name" name="name" pattern='[a-zA-Z]+' required>

          <label for="surname">Surname</label>
          <input type="text" id="surname" name="surname" pattern="[a-zA-Z]+" required>

          <label for="email">Email address</label>
          <input type="email" id="email" name="email" required>

          <label for="hotels">Choose your hotel</label>
          <select id="hotels" name="hotels" required>
            <option value="Gorgoroth Hotel">Hotel Gorgoroth</option>
            <option value="The Overlook Hotel">The Overlook Hotel</option>
            <option value="Grand Budapest Hotel">Grand Budapest Hotel</option>
            <option value="Hotel Transylvania">Hotel Transylvania</option>
          </select>

          <label for="checkIn">Check In</label>
          <input type="date" id="checkIn" name="checkIn" required>
          <p id="dateValidation">Please choose date greater then today</p>

          <label for="checkOut">Check Out</label>
          <input type="date" id="checkOut" name="checkOut" required>
          <p id="dateValidationTwo">Please choose date greater then checkin date</p>

          <label for="numAdults">Number of adults</label>
          <input type="text" id="numAdults" name="numAdults" pattern="\d" required>

          <label for="numChildren">Number of children</label>
          <input type="text" id="numChildren" name="numChildren" pattern="\d" placeholder="enter 0 if no children" required>

          <button id='submitInfoButton' type="submit" name="submit" value="submit">Submit</button>

        </form> 
      </div> 
    </div>
    <?php if ($_POST['submit']) { 
          // The folling validates the dates because - if the checkout date is chosen first, it is possble to choose
          //a checkIn date that is greater then the checkout.
          $convertCheckIn = str_replace("-", "", $_POST['checkIn']);
          $checkInVal = intval($convertCheckIn);
          $convertCheckOut = str_replace("-", "", $_POST['checkOut']);
          $checkOutVal = intval($convertCheckOut);
            if(($checkInVal - $checkOutVal) < 0) {?>
            <div class="informationContainer">
                <div class="selectedInformation">
                  <div id="info">
                    <p id="thankYouFor">Thank you <span><?php $newBooking->getFullname();?></span> for choosing <br><span><?php $newBooking->getHotel();?></span></p>
                    <h3>Dates - </h3>
                    <p>Checkin on the - <span><?php $newBooking->getCheckIn();?></span></p>
                    <p>Checkout on the - <span><?php $newBooking->getCheckOut();?></span></p>
                    <p>Number of nights - <span><?php $newBooking->getNumberOfDays();?></span></p>
                    <h3>Guest information and cost - </h3>
                    <p><span><?php $newBooking->getNumOfAdults();?> adults</span> and <span><?php $newBooking->getNumOfChildren();?> children</span></p>                                
                    <p>Adults = <span>R<?php $newBooking->getAdultCostTotal()?></span> at <span>R<?php $newBooking->getAdultRate();?></span> per adult per night.</p>
                    <p>Children = <span>R<?php $newBooking->getChildCostTotal()?></span> at <span>R<?php $newBooking->getChildRate();?></span> per child per night</p>
                    <p> Total Cost = <span>R<?php $newBooking->getTotalCost()?></span></p>

                    <p id='notSure'>Not too sure about <span><?php $newBooking->getHotel();?></span> ? Why don't you compare it to some of the other hotels in the area?</p>
                  </div>  
      
                  <section id="selectedHotelButtons">
                    <button class='button' id="compareButton" onClick="window.location='compare.php';">Compare</button>
                    <button class='button' id="amend" onClick="window.location='index.php';">Amend selection</button>
                    <button class='button' id="confirm" onClick="window.location='booknow.php';">Confirm Booking</button>
                  </section>                
                </div>
            </div>
        <?php } else { ?>
          <div id=errorContainer>
            <div id="error">
              <p>Please make sure that your check out date is greater then your check in</p>
              <button class='button' onClick="window.location='index.php';">Go back to selection</button>
            </div>
          </div>          
          <?php
      }} ?>  
  </body>
  
  <div id="mainFooter">
    <?php include("footer.php") ?>
  </div>

  <script src="script/script.js" type="text/javascript"></script>
  <script src="script/menu.js" type="text/javascript"></script>

</html>

