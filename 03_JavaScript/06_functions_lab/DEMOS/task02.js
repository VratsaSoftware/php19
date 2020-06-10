var arr = [11, 3, 17, 23, 31];

function isPrime(num) {
    for(var i = 2; i <= num/2; i++){
        if(num % i === 0){
            return false;
        } 
    }      
    return true;
  }

for (let index = Math.min.apply(Math, arr); index < Math.max.apply(Math, arr); index++) {
  
   if ( isPrime(index) && !arr.includes(index)){
       console.log(index);
   }
}


