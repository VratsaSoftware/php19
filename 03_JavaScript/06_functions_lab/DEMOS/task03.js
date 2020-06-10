var arr = [0, 1, 2, 3, 4, 5], num = 7;

function getSubArrays(arr){
    if (arr.length === 1) return [arr];
    
    else {
        subarr = getSubArrays(arr.slice(1));
        console.log( subarr );
        return subarr.concat(subarr.map(e => e.concat(arr[0])), [[arr[0]]]);
    }
  }

function isThereSumCombination(arr, num){
    var newArr = getSubArrays(arr), len = newArr.length;
    for (let index = 0; index < len; index++) {     
        if (returnSum(newArr[index]) === num){
            // console.log(newArr[index]);
        }        
    }
}

function returnSum(arr){
    var sum = 0;
    for (let i = 0; i < arr.length; i++) {
        sum += arr[i];
    }
    return sum;
}

isThereSumCombination(arr, num);
