function factorial( n ) {
	n = n ? n * factorial( n - 1 ) : 1;
	console.log( n );
  return n;
}

console.log( factorial(5) );
