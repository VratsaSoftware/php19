function paintMatrix(n) {	
    for (var i = 1; i <= n; i++) {
      
      var result = "";
      // console.log( 'i' + i )
      for (var j = 1; j <= n; j++) {
      	// console.log( 'j' + j )
        result += (i + j - 1);
        result += ' ';
      }
      console.log(result);
    }
}

paintMatrix(4);