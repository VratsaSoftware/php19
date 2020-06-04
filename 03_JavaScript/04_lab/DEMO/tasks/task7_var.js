var num = 2, start = 1, final = [];

    for (var i = 0; i < num; i++) {
    	final[i] = [];
        for (var n = start; n < (num+start); n++) {
            final[i].push(n);
        }
            start++;
        }

console.log(final);