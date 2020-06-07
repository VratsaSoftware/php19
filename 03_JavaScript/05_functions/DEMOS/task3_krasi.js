function oddInArray(arr, odd){
    let len = arr.length,
        sum = 0;
        
        if( odd === true ){
            for ( let i=0; i<len; i++ ){
                if( arr[i] % 2 == 0) { sum +=arr[i] }
            }
        } else {
            for (let i=0; i < len; i++){
                if( arr[i] % 2 != 0) { sum +=arr[i] }
            }
        }

    console.log ( sum ) 
}

oddInArray([1,2,3,4], true);