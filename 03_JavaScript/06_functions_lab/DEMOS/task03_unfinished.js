function arrAndNumber(arr, num) {
    let len = arr.length;

    for (var i = 0; i < len; i++) {
        for (var j = 0; j < len; j++) {
            if (arr[i] + arr[j] == num) {
                return true;
                break;
            }
        }
    }
    return false;
}

console.log(arrAndNumber([0, 1, 2, 3, 4, 5],12))
// console.log(arrAndNumber([0, 1, 2, 3, 4, 5],9))