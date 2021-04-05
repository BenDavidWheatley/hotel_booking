<?php  session_start();

  
if(isset($_POST['submit'])){
  $_SESSION['name'] = $_POST['name']; 
  $_SESSION['surname'] = $_POST['surname'];
  $_SESSION['hotels'] = $_POST['hotels'];
  $_SESSION['checkIn'] = $_POST['checkIn'];
  $_SESSION['checkOut'] = $_POST['checkOut'];
  $_SESSION['numAdults'] = $_POST['numAdults'];
  $_SESSION['numChildren'] = $_POST['numChildren'];
  $_SESSION['email'] = $_POST['email'];
}

// Class with all the information regarding the booking

class BookingInformation {
    private $name;
    private $surname;
    private $hotel;
    private $checkIn;
    private $checkOut;
    private $numOfAdults;
    private $numberOfChildren;
    private $numberOfDays;
    private $email;

    //Methods
 
    //Setters
    public function setName ($name){
        $this->name = $name;
    }  
    public function setSurname ($surname){
        $this->surname = $surname;
    }
    public function setHotel ($hotel){
        $this->hotel = $hotel;
    } 
    public function setCheckIn($checkIn){
        $this->checkIn = $checkIn;
    }
    public function setCheckOut($checkOut){
        $this->checkOut = $checkOut;
    }  
    public function setNumOfAdults ($adults){
        $this->numberOfAdults = $adults;
    } 
    public function setNumOfChildren($children){
        $this->numberOfChildren = $children;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setNumberOfDays($checkIn, $checkOut){
        $diff = strtotime($checkOut) - strtotime($checkIn); 
        $this->numberOfDays = (abs(round($diff / 86400))) + 1; // 86400 is the number of seconds in the day. Adding 1 includes the day booked
    }

    //Getters
    public function getName(){
        echo $this->name;
    } 
    public function getSurname(){
        echo $this->surname;
    }
    public function getHotel(){
        echo $this->hotel;
    }
    public function getCheckIn(){
        echo $this->checkIn;
    }
    public function getCheckOut(){
        echo $this->checkOut;
    }
    public function getNumOfAdults(){
        echo $this->numberOfAdults;
    }
    public function getNumOfChildren(){
        echo $this->numberOfChildren;
    }
    public function getNumberOfDays(){
        echo $this->numberOfDays;
    }
    public function getEmail(){
        echo $this->email;
    }
}
   
// Setting of the variables from the form submition

$newBooking = new BookingInformation;
    $newBooking->setName($_SESSION['name']);
    $newBooking->setSurname($_SESSION['surname']);
    $newBooking->setHotel($_SESSION['hotels']);
    $newBooking->setCheckIn($_SESSION['checkIn']);
    $newBooking->setCheckOut($_SESSION['checkOut']);
    $newBooking->setNumOfAdults($_SESSION['numAdults']);
    $newBooking->setNumOfChildren($_SESSION['numChildren']);
    $newBooking->setEmail($_SESSION['email']);
    $newBooking->setNumberOfDays($_SESSION['checkIn'], $_SESSION['checkOut']);

switch ($_SESSION['hotels']){
    case "Gorgoroth Hotel":
        $rateAdult = 1800;
        $rateChild = 800;
      break;
    case "The Overlook Hotel":
        $rateAdult = 2500;
        $rateChild = 1500;
      break;
    case "Grand Budapest Hotel":
        $rateAdult = 3000;
        $rateChild = 2000;
      break;
    case "Hotel Transylvania":
        $rateAdult = 2200;
        $rateChild = 1500;
      break;
  }
    $_SESSION['adultCost'] = (3 /*number of adults*/ * $rateAdult) *  2 /*number of days*/;
    $_SESSION['childCost'] = (3 /*number of children*/ * $rateChild) *  2 ;
    $_SESSION['totalCost'] = $_SESSION['adultCost'] + $_SESSION['childCost'];

/*

//the below old code is currently being used and working

$_SESSION['gorgorothAdultRate'] = 1800;
$_SESSION['gorgorothChildRate'] = 800;

$_SESSION['budapestAdultRate'] = 3000;
$_SESSION['budapestChildRate'] = 2000;

$_SESSION['transylvaniaAdultRate'] = 2200;
$_SESSION['transylvaniaChildRate'] = 1300;

$_SESSION['overlookAdultRate'] = 2500;
$_SESSION['overlookDayChildRate'] = 1500;

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
} */

?>