// 4.	Напишете JavaScript програма, 
// която по зададен масив от числа и число, 
// отпечатва bigger или not bigger, 
// в зависимост от това дали елементът с индекс,
//  подаденото число е по-голям от съседните си два елемента. 
//  Ако елементът е в началото/края на масива 
//  – програмата ви отпечатва – only one neighbour’ и 
//  invalid index в случай, 
// че няма елемент с такъв индекс.

var ind = 0, arr = [1, 2, 5, 3, 4], len = arr.length;

if( ind >= len || ind < 0 ){
	console.log('invalid index')
}  else if( ind === 0 || ind === ( len-1 ) ) {
	console.log('only one neighbour')
} else {
	if( arr[ind] > arr[ind-1] && arr[ind] > arr[ind+1] ){
		console.log('bigger')
	} else {
		console.log('not bigger')
	}
}