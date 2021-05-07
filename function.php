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

/* The following class creates a list of activities */

class HotelActivities {
    private $activities = array();

    public function setActivities(...$arguments) {
        foreach ($arguments as $activities) {
            array_push($this->activities, $activities);             
        }
    }
    public function getActivities(){
            ?><ul><?php         
            for ($x = 0; $x < count($this->activities); $x++) {
            ?>           
            <li class="activitiesList"><?php echo $this->activities[$x];?></li>           
            <?php       
        }?></ul><?php
    } 
} 

$gorgorothActivities = new HotelActivities;
    $gorgorothActivities->setActivities("Drake riding", "Caragor riding", "Running away from the local Orcs", "Avoiding the ever watching eye of Sauron" );  

$budapestActivities = new HotelActivities;
    $budapestActivities->setActivities("Skiing", "Avoiding the local authorities as they may accuse you of murder" );

$overlookActivities = new HotelActivities;
    $overlookActivities->setActivities("Trying not to go insane", "Avoiding the elevators of blood", "Avoiding the twins", "Getting lost in the maze" );

$transylaviaActivities = new HotelActivities;
    $transylaviaActivities->setActivities("Trying not to let it be know that you are not a monster", "Dressing up; you'll need a disquise every day");

// Class with all the information regarding the booking

class BookingInformation {

    // Booking details variables
    private $name;
    private $surname;
    private $fullname;
    private $hotel;
    private $checkIn;
    private $checkOut;
    private $numberOfAdults;
    private $numberOfChildren;
    public $numberOfDays;
    private $email;

    // Booking cost variables

    public $adultRate;
    public $childRate;
    private $adultTotalCost;
    private $childTotalCost;
    private $totalCost; 
    private $finalHotelSelection;
    private $finalCost;

    //hotel rates

    public $gorgorothAdultRate = 800;
    public $gorgorothChildRate = 600;
    public $overlookAdultRate = 1000;
    public $overlookChildRate = 650;
    public $budapestAdultRate = 1300;
    public $budapestChildRate = 1000;
    public $transylvaniaAdultRate = 1100;
    public $transylvaniaChildRate = 900;

    //Compared hotel variables

    private $transylvaniaCompare; 
    private $gorgorothCompare;
    private $budapestCompare;
    private $overlookCompare;

    //Setters

    public function setName ($name){
        $this->name = $name;
    }  
    public function setSurname ($surname){
        $this->surname = $surname;
    }
    public function setFullname () { 
        $this->fullname = $this->name . " " . $this->surname;
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
        $this->numberOfDays = (abs(round($diff / 86400))); // 86400 is the number of seconds in the day. Adding 1 includes the day booked
    }
    public function setRates($hotelSelect) {      
        switch ($hotelSelect){
            case "Gorgoroth Hotel":
                $this->adultRate = $this->gorgorothAdultRate;
                $this->childRate = $this->gorgorothChildRate;
              break;
            case "The Overlook Hotel":
                $this->adultRate = $this->overlookAdultRate;
                $this->childRate = $this->overlookChildRate;
              break;
            case "Grand Budapest Hotel":
                $this->adultRate = $this->budapestAdultRate;
                $this->childRate  = $this->budapestChildRate;
              break;
            case "Hotel Transylvania":
                $this->adultRate = $this->transylvaniaAdultRate;
                $this->childRate  = $this->transylvaniaChildRate;
              break;
          }
        }   

    public function setTotalCost() {
        $this->adultTotalCost=($this->numberOfAdults * $this->adultRate) * $this->numberOfDays;
        $this->childTotalCost=($this->numberOfChildren * $this->childRate) * $this->numberOfDays;
        $this->totalCost= ($this->adultTotalCost + $this->childTotalCost);
        }

    //the following functions set the comparisons of the hotel costing

    public function setHotelCompare(){
        $this->transylvaniaCompare = (($this->numberOfAdults * $this->transylvaniaAdultRate) + ($this->numberOfChildren * $this->transylvaniaChildRate)) * $this->numberOfDays;
        $this->budapestCompare = (($this->numberOfAdults * $this->budapestAdultRate) + ($this->numberOfChildren * $this->budapestChildRate)) * $this->numberOfDays;
        $this->gorgorothCompare = (($this->numberOfAdults * $this->gorgorothAdultRate) + ($this->numberOfChildren * $this->gorgorothChildRate)) * $this->numberOfDays;
        $this->overlookCompare = (($this->numberOfAdults * $this->overlookAdultRate) + ($this->numberOfChildren * $this->overlookChildRate)) * $this->numberOfDays;
        }

    //The following sets the final chosen hotel and costing

    Public function setFinalSelection(){
        if ($_POST["hotelTrans"]){
            $this->finalHotelSelection =  "Hotel Transylvania";
            $this->finalCost = $this->transylvaniaCompare;
        } else if ($_POST["gorgorothHotel"]){
            $this->finalHotelSelection =  "Gorgoroth Hotel";
            $this->finalCost = $this->gorgorothCompare;
        } else if ($_POST["budapestHotel"]){
            $this->finalHotelSelection =  "Budapest Hotel";
            $this->finalCost = $this->budapestCompare;
        } else if ($_POST["overlookHotel"]){
            $this->finalHotelSelection =  "Overlook Hotel";
            $this->finalCost = $this->overlookCompare;
        } else {
            $this->finalHotelSelection = $this->hotel;
            $this->finalCost = $this->totalCost;
        }}

    //Getters
    public function getName(){
        echo $this->name;
    } 
    public function getSurname(){
        echo $this->surname;
    }
    public function getFullname(){
        echo $this->fullname;
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
    public function getAdultRate(){
        echo $this->adultRate;
    }
    public function getChildRate(){
        echo $this->childRate;
    }
    public function getAdultCostTotal(){
        echo $this->adultTotalCost;
    }
    public function getChildCostTotal(){
        echo $this->childTotalCost;
    }
    public function getTotalCost(){
        echo $this->totalCost;
    }
    public function getTransCompare(){
        echo $this->transylvaniaCompare;
    }
    public function getGorgorothCompare(){
        echo $this->gorgorothCompare;
    }
    public function getBudapestCompare(){
        echo $this->budapestCompare;
    }
    public function getOverlookCompare(){
        echo $this->overlookCompare;
    }   
    public function getFinalCost(){
        echo $this->finalCost;
    }
    public function getFinalHotelSelection(){
        echo $this->finalHotelSelection;
    }
} 

$newBooking = new BookingInformation;
    $newBooking->setName($_SESSION['name']);
    $newBooking->setSurname($_SESSION['surname']);
    $newBooking->setFullname();
    $newBooking->setHotel($_SESSION['hotels']);
    $newBooking->setCheckIn($_SESSION['checkIn']);
    $newBooking->setCheckOut($_SESSION['checkOut']);
    $newBooking->setNumOfAdults($_SESSION['numAdults']);
    $newBooking->setNumOfChildren($_SESSION['numChildren']);
    $newBooking->setEmail($_SESSION['email']);
    $newBooking->setNumberOfDays($_SESSION['checkIn'], $_SESSION['checkOut']);
    $newBooking->setRates($_SESSION['hotels']);
    $newBooking->setTotalCost();
    $newBooking->setHotelCompare();
    $newBooking->setFinalSelection();

