var arr = ['Welcome', 'everyone', 'to', 'Welcome', 'to',  'Java', 'Welcome', 'to', 'everyone'], 
	uniVal = [], valrepeat = [], len = arr.length, ind = 0;

	for( let i = 0; i < len; i++ ){
		if( uniVal.indexOf(arr[i] ) > -1 ){
		var currentInd = uniVal.indexOf(arr[i] );
		valrepeat[currentInd] += 1;

		} else {
			uniVal.push(arr[i]);
			valrepeat[ind] = 1;
			ind++;
		}
	}

	console.log(uniVal);
	console.log(valrepeat);

	for( var j = 0; j < uniVal.length; j++ ){
		console.log( uniVal[j] + '->' + valrepeat[j])
	}



