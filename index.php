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
    <?php include('header.php') ?>
  </header>
  
  <body class='mainBody'>
    <h1>Hotel Compare</h1>
    <p>for those with a more adventurios side</p>

  <!-- Checkin and comapre form -->

    <div class="formContainer">
      <h1>Information</h1>
      <form id="form"  action="index.php" method="post">
        
        <label for="name">Name</label>
        <input type="text" id="name" name="name">

        <label for="name">Surname</label>
        <input type="text" id="surname" name="surname">

        <label for="hotels">choose your hotel</label>
        <select id="hotels" name="hotels">
          <option value="Gorgoroth Hotel">Hotel Gorgoroth</option>
          <option value="The Overlook Hotel">The Overlook Hotel</option>
          <option value="Grand Budapest Hotel">Grand Budapest Hotel</option>
          <option value="Hotel Transylvania">Hotel Transylvania</option>
        </select>

        <label for="checkIn">Check In</label>
        <input type="date" id="checkIn" name="checkIn">

        <label for="checkOut">To Date</label>
        <input type="date" id="checkOut" name="checkOut">

        <label for="numAdults">Number of adults</label>
        <input type="text" id="numAdults" name="numAdults">

        <label for="numChildren">Number of children</label>
        <input type="text" id="numChildren" name="numChildren">

        <label for="email">Please provide an email for booking confirmation</label>
        <input type="email" id="email" name="email">

        <button type="submit" name="submit" value="submit">Submit</button>

        <!-- must vaildate form with required, check dates, no html inputs, valid emial -->

        <?php if ($_POST['submit']) { ?>
        <div id="selectedInformation">
          <p>Thank you <?php echo $newBooking->getName() . " "; echo $newBooking->getSurname()?> for choosing <?php echo $newBooking->getHotel();?></p>
          <h4>Dates</h4>
          <p>checkin for the - <?php echo $newBooking->getCheckIn();?></p>
          <p>checkout on the - <?php echo $newBooking->getCheckOut();?></p>
          <p>Number of days - <?php echo $newBooking->getNumberOfDays();?></p>
          <h4>Number of guests</h4>
          <p><?php echo $newBooking->getNumOfAdults(); ?> adults and <?php echo $newBooking->getNumOfChildren(); ?> children</p>
          
          <p> Cost is - <br> 
          Adults total R<?php echo $newBooking->getAdultCostTotal()?> at R<?php echo $newBooking->getAdultRate();?> per adult per night.<br>
          Children total R<?php echo $newBooking->getChildCostTotal()?> at R<?php echo $newBooking->getChildRate(); ?> per child per night</p>
          <p> Total Cost = R<?php echo $newBooking->getTotalCost()?></p>

          <p>Not too sure about <?php echo $newBooking->getHotel(); ?> ? Why don't you compare it to some of the other hotels in the area?</p>
          <button formaction="compare.php">Compare</button>
       </div>
       <?php } ?>
      </form>     
    </div>

  </body>

  <footer">
    <?php include("footer.php") ?>
  </footer>

</html>

