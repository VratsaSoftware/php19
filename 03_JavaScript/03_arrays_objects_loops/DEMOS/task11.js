var minMaxArr = [2, 12, 2, 2, 25, 12], occurances, 
len = minMaxArr.length;
occurances = new Map();
for (var i = 0; i < len; i++) {
        if (occurances[minMaxArr[i]] !== undefined){
            occurances[minMaxArr[i]]++;
        } else {
            occurances[minMaxArr[i]] =  1;
        }
    }
    console.log(occurances);

