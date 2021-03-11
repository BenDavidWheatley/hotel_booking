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


$test = 'test';
//Information about each hotel

class Hotel extends BookingInformation {

    public $gorgorothAdultRate = 1800;
    public $gorgorothChildRate = 800;
    public $budapestAdultRate = 3000;
    public $budapestChildRate = 2000;
    public $overlookAdultRate = 2200;
    public $overlookChildRate = 1300;
    public $transylvaniaAdultRate = 2500;
    public $transylvaniaChildRate = 1500;
   
    public function setDayRates ($adultDayRate, $childDayRate){
        $this->adultDayRate = $adultDayRate;
        $this->childDayRate = $childDayRate;
    }
    public function getAdultRate (){
        echo $_SESSION['transylvaniaChildRate'];       
    }
    public function getChildRate(){
        echo $this->childDayRate;
    }
}

if(isset($_POST['submit'])){
    $cost = new Hotel;
}

class Resorts extends Hotel {
    
}



//the below code is currently being used and working

$_SESSION['gorgorothAdultRate'] = 1800;
$_SESSION['gorgorothChildRate'] = 800;

$_SESSION['budapestAdultRate'] = 3000;
$_SESSION['budapestChildRate'] = 2000;

$_SESSION['transylvaniaAdultRate'] = 2200;
$_SESSION['transylvaniaChildRate'] = 1300;

$_SESSION['overlookAdultRate'] = 2500;
$_SESSION['overlookDayChildRate'] = 1500;


?>