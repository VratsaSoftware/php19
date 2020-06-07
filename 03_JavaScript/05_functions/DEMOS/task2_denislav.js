var number = 512;

function lastNum( param ){
	let words = [
    "zero", "one", "two", "three", "four", "five", "six", "seven", "eigth", "nine"
	], numStr, lastNumber;
     
    numStr = param.toString();
    lastNumber = numStr[numStr.length-1];
    console.log('The number is: ' + lastNumber);
    console.log( words[parseInt(lastNumber)] );
}

lastNum( number );