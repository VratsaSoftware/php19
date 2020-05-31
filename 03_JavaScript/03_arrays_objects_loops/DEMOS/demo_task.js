var arr = [1, 2, 3, 4, 5, 6], 
	len = arr.length, newArr = [];

	for( let i = 0; i < len; i++ ){
		newArr.unshift(arr[i]);
		console.log(newArr);
	}
