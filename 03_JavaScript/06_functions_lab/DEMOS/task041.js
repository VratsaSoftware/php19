function saw(arr) {
	let len = arr.length, flag = true;

	if ((arr.length == 1) || (arr.length == 2)) {
		console.log('yes');
		return true;
	} 

	for (var i = 1; i < len-1; i++) {

		if ((arr[i] > arr[i + 1] && arr[i] > arr[i -1]) || (arr[i] < arr[i + 1] && arr[i] < arr[i - 1]) ) {
			continue;
		}else {
			console.log('no');
			return false;
		}
	}
	
	console.log('yes');
	return true;
	
}

//saw([5,10])
saw([1, 5, 1, 0, 3]);
//saw([5, -10, 10, -2, 11, -22])