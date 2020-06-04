function redica(arr){
    let count = 1,
        tempCount = 1,
        number = 0,
        len =arr.length;
    
    for (let i = 0; i < len - 1; i++)
    
    {
        if (Number(arr[i]) === Number(arr[i + 1])) {
            
            tempCount++;
        
        } else{
            
            tempCount = 1;        
        }
    
        if (tempCount > count)
        {
            count = tempCount;
    
            number = arr [i];
        }
    }
        
        console.log(count);
    
    for (let i = 0; i < count; i++){
        console.log( number);
    }
}

// let arr = ['2', '1', '1'];
let arr = ['10', '2', '1', '1', '2', '3', '3', '2', '2', '2', '1', '1'];

redica(arr);
// redica(['10', '2', '1', '1', '2', '3', '3', '2', '2', '2', '1', '1', '1', '1']);