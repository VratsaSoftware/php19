function sumTo(n) {
  if ( n == 1 ) return 1;
  n = n + sumTo( n - 1 ); 
  console.log( n )
  return n;
}

( sumTo( 4 ) );
