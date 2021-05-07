
document.getElementById("dateValidation").style.display = "none"; 
document.getElementById("dateValidationTwo").style.display = "none"; 

let checkIn = document.getElementById('checkIn');
let checkOut = document.getElementById('checkOut');



let d = new Date(); 
let test = 0;

checkIn.addEventListener('change', function(){
  if(new Date(this.value).getTime() <= d.getTime()){
    let check = document.getElementById('checkIn');
    console.log(check);

    test = new Date(this.value).getTime(); 
    document.getElementById("dateValidation").style.display = "block"; 
  }
  else{
    test = new Date(this.value).getTime(); 
    console.log(test);
    document.getElementById("dateValidation").style.display = "none"; 
  }
})

checkOut.addEventListener('change', function(){
    let t = new Date(); 
    checkOutDate = t.getTime()
    if(new Date(this.value).getTime() <= test){
      document.getElementById("dateValidationTwo").style.display = "block"; 
    }
    else{
      document.getElementById("dateValidationTwo").style.display = "none"; 
      
    }
  })
