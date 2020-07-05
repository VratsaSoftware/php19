// function pow( x, n ){
// 	let res = 1;
// 	for( let i = 1; i <= n; i++ ){
// 		res = res * x;
// 		console.log( res );
// 	}
// 	return res;
// }
function pow(x, n) {	
	// console.log( n );

  if ( n == 1 ) {
    return x;
  } else {
  	x = x * pow( x, n - 1 );  
  	
  	console.log( "n - " + n );	
  	console.log( 'x - ' + x );	
    return x;
  }

}

// console.log(pow(2, 2));
// console.log( pow( 2, 3 ) );
(pow(2, 4));
// console.log(pow(2, 4));
