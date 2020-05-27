let numbers = 7777777, numbersStr, len;
// let numbers = 3427524, numbersStr;
numbersStr = numbers.toString();
len = numbersStr.length;

// console.log(numbers.toString().length)


if ( len < 3 ) console.log("Give more numbers")
// console.log( numbersStr.indexOf(7) == numbersStr.length - 4 ? true : false )
console.log( numbersStr[len-4] == 7 ? true : false )

// console.log( numbersStr[len-4] )