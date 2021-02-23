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
  <?php   

$date1 = $_POST['checkIn'];
$date2 = $_POST['checkOut'];
$_SESSION['days'] = dateDiffInDays($date1, $date2); 
?> 
   
  <header class='headerContainer'>
    <nav class="navigation">
      <a href="index.php"><p>Home</p></a>
      <a href="gorgoroth.php"><p>Hotel Gorgoroth</p></a>
      <a href="budapest.php"><p>Grand Budapest Hotel</p></a>
      <a href="shining.php"><p>The Overlook Hotel</p></a>
      <a href="transylvania.php"><p>Hotel Transylvania</p></a>
    </nav>
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

        <?php if ($_POST['submit']){        
          $_SESSION['name'] = $_POST['name'];
          $_SESSION['hotels'] = $_POST['hotels'];
          $_SESSION['startDate'] = $_POST['checkIn'];
          $_SESSION['endDate'] = $_POST['checkOut'];
          $_SESSION['adults'] = $_POST['numAdults'];
          $_SESSION['children'] = $_POST['numChildren'];

          if($_SESSION['hotels'] === "Gorgoroth Hotel"){
              $rateAdult = $_SESSION['gorgorothAdultRate'];
              $rateChild = $_SESSION['gorgorothChildRate'];
              $_SESSION['adultCost'] = ($_SESSION['adults'] * $_SESSION['gorgorothAdultRate']) * $_SESSION['days'];
              $_SESSION['childCost'] = ($_SESSION['children'] * $_SESSION['gorgorothChildRate']) * $_SESSION['days'];
              $_SESSION['totalCost'] = $_SESSION['adultCost'] + $_SESSION['childCost'];
          } elseif ($_SESSION['hotels'] === "The Overlook Hotel") {
              $rateAdult = $_SESSION['overlookAdultRate'];
              $rateChild = $_SESSION['overlookDayChildRate'];
              $_SESSION['adultCost'] =  ($_SESSION['adults'] * $_SESSION['overlookAdultRate']) * $_SESSION['days'];
              $_SESSION['childCost'] = ($_SESSION['children'] * $_SESSION['overlookDayChildRate']) * $_SESSION['days'];
              $_SESSION['totalCost'] =  $_SESSION['adultCost'] + $_SESSION['childCost'];;
          } elseif ($_SESSION['hotels'] === "Grand Budapest Hotel") {
              $rateAdult = $_SESSION['budapestAdultRate'];
              $rateChild = $_SESSION['budapestChildRate'];
              $_SESSION['adultCost'] =  ($_SESSION['adults'] * $_SESSION['budapestAdultRate']) * $_SESSION['days'];
              $_SESSION['childCost'] = ($_SESSION['children'] * $_SESSION['budapestChildRate']) * $_SESSION['days'];
              $_SESSION['totalCost'] =  $_SESSION['adultCost'] + $_SESSION['childCost'];;
          } elseif ($_SESSION['hotels'] === "Hotel Transylvania") { 
              $rateAdult = $_SESSION['transylvaniaAdultRate'];
              $rateChild = $_SESSION['transylvaniaChildRate'];
              $_SESSION['adultCost'] =  ($_SESSION['adults'] * $_SESSION['transylvaniaAdultRate']) * $_SESSION['days'];
              $_SESSION['childCost'] = ($_SESSION['children'] * $_SESSION['transylvaniaChildRate']) * $_SESSION['days'];
              $_SESSION['totalCost'] =  $_SESSION['adultCost'] + $_SESSION['childCost'];
          }
        ?>
        <div id="selectedInformation">
          <p>Thank you <?php echo $_SESSION['name']; ?> for choosing <?php echo $_SESSION['hotels']; ?></p>
          <h4>Dates</h4>
          <p>checkin for the - <?php echo $_SESSION['startDate'];?></p>
          <p>checkout on the - <?php echo $_SESSION['endDate']; ?></p>
          <p>Number of days - <?php echo $_SESSION['days']?></p>
          <h4>Number of guests</h4>
          <p><?php echo $_SESSION['adults']; ?> adults and <?php echo $_SESSION['children']; ?> children</p>
          
          <p> Cost is - <br> Adults total R<?php echo $_SESSION['adultCost'] ?> 
          at R<?php echo $rateAdult ; ?> per adult per night.<br>
          Children total R<?php echo $_SESSION['childCost'] ?> at R<?php echo $rateChild; ?> per child per night</p>
          <p> Total Cost = R<?php echo $_SESSION['totalCost'] ?></p>
          

          <p>Not too sure about <?php echo $_POST['hotels']; ?> ? Why don't you compare it to some of the other hotels in the area?</p>
          <button formaction="compare.php">Compare</button>
       </div>
       <?php } ?>

      </form>
        
      
    </div>

  </body>

  <footer class="footerContainer">
  </footer>

</html>

