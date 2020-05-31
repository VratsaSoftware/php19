var arr = [1, 2, 3, , 5, ,], len = arr.length;

console.log(len)

for(let i = 0; i < len; i++){
	console.log(arr[i])
}


delete arr[4]

console.log(arr)

for(let i = 0; i < len; i++){
	console.log(arr[i])
}

