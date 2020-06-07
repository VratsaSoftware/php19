function returnOccurances(arr, num){
    var occur = 0;
    for (let index = 0; index < arr.length; index++) {
        if (arr[index] === num){
            occur++;
        }        
    }
    return occur;
}

console.log(returnOccurances([2, 3, 4, 5, 6, 2, 1, 2, 2, 2], 2));
console.log(returnOccurances([43, 3, 434, 4, 4, 3, 3, 4, 5, 3], 3));
console.log(returnOccurances([2, 3, 4, 5, 7, 8, 9, 1, 0, 3], 2));