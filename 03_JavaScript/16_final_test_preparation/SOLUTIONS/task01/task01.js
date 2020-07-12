function uniqueNums(arg){
	if( arg ){
		let arr = arg.split(' '), result = [];
		for( let ind in arr ){
			if( !isNaN(arr[ind]) ){				
				if( !result.includes(arr[ind]) ){
					result.push(arr[ind]);
				}
			}
		}
		if( result.length ){
			return result;
		}else {
			return "The input values must be convertible to numbers";
		}

	}else {
		return 'The input must not be an empty string';
	}
}

// const str = '';
// const str = '1 2 2 6 8 6 7 8';
// const str = '0 0 0 0 0';
const str = 'mk pp we vfv';
// const str = '1 br 2 1 werr 3 1';
// const str = '2 "" add "" 1 1 asd 2 "" 3';

console.log(uniqueNums(str));