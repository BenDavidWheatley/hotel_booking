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
    private $numberOfAdults;
    private $numberOfChildren;
    public $numberOfDays;
    private $email;
    public $adultRate;
    public $childRate;
    private $adultTotalCost;
    private $childTotalCost;
    private $totalCost; 

    //hotel rates

    public $gorgorothAdultRate = 1800;
    public $gorgorothChildRate = 800;
    public $overlookAdultRate = 2500;
    public $overlookChildRate = 1500;
    public $budapestAdultRate = 3000;
    public $budapestChildRate = 2000;
    public $transylvaniaAdultRate = 2200;
    public $transylvaniaChildRate = 1500;

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

    public function setTransCompare(){
        $this->transylvaniaCompare = (($this->numberOfAdults * $this->transylvaniaAdultRate) + ($this->numberOfChildren * $this->transylvaniaChildRate)) * $this->numberOfDays;
        }
    
    public function setbudapestCompare(){
        $this->budapestCompare = (($this->numberOfAdults * $this->budapestAdultRate) + ($this->numberOfChildren * $this->budapestChildRate)) * $this->numberOfDays;
        }

    public function setGorgorothCompare(){
        $this->gorgorothCompare = (($this->numberOfAdults * $this->gorgorothAdultRate) + ($this->numberOfChildren * $this->gorgorothChildRate)) * $this->numberOfDays;
        }

    public function setOverlookCompare(){
        $this->overlookCompare = (($this->numberOfAdults * $this->overlookAdultRate) + ($this->numberOfChildren * $this->overlookChildRate)) * $this->numberOfDays;
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
    $newBooking->setRates($_SESSION['hotels']);
    $newBooking->setTotalCost();
    $newBooking->setTransCompare();
    $newBooking->setGorgorothCompare();
    $newBooking->setBudapestCompare();
    $newBooking->setOverlookCompare();

$newConfirmation = new BookingInformation;
?>