function drawTriangle( param ){
	let num, str; 
	for( let i = 1; i <= param; i++ ){	
		num = 1;
		str = '';
		while( num <= i ){			
			str += num;	
			str += ' ';
			num++;		
		}
		 console.log( str );	
	}

	for( let i = param - 1; i >= 1; i-- ){
		num = 1;
		str = '';
		while( num <= i ){			
			str += num;	
			str += ' ';
			num++;		
		}
		console.log( str )
	}
}

drawTriangle( 5 );