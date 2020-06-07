function nthDigit( param1, param2 ){
	let numStr = Math.abs(param2).toString(), ind = param1, len;
	// console.log(numStr)
	
	numStr = numStr.replace('.', '');
	
	len = numStr.length;
	
	if( len < ind ){
		console.log( 'The number doesn’t have ' + ind + ' digits' );
	} else {
		console.log(numStr[len-ind])
	}

}

nthDigit( 6, 888.88 )