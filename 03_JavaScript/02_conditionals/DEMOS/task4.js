var numToSplit = 102355479, 
	result = 0, numStr = numToSplit.toString(), 
	len = numStr.length;

// splittedArray = numToSplit.toString().split('');
//         for (var i = splittedArray.length - 1; i >= 0; i--) {
//             result += parseInt(splittedArray[i]);
//         }

//         console.log(result % 3 == 0 ? result : '');


for(let i = 0; i < len; i++ ){
	result += +numStr[i];
	console.log(result)
}

console.log(result % 3 == 0 ? result : 'Not divisible to 3');

console.log(result)


// console.log(+'1.2' + (+variable))