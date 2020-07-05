function fib(n) {
	n = n <= 1 ? n : fib(n - 1) + fib(n - 2);
  return n;
}


console.log( fib( 5 ) )