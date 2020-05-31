var minMaxArr = [1, 2, 1, 15, 20, 5, 7, 31], 
		len = minMaxArr.length,
		min = minMaxArr[0],
 		max = minMaxArr[0];
for (var i = 0; i < len; i++) {
        if (min > minMaxArr[i]){
            min = minMaxArr[i];
        }
        if (max < minMaxArr[i]){
            max = minMaxArr[i];
        }
    }


    console.log(min, max)

