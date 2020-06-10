// function MaksNumber(param){
//     let num = param,count = 0;
//     for (var i = 0; i <= num; i++){
//         for(var j = 1; j <= num; j++) {
//             if ((i*i) + (j*j) == num) {
//                 count++;
//                 console.log(i, j)
//             }
//         }
//     }
//     return count;
// }

// console.log(MaksNumber(25))

var k = 25, variant = 0, sumVariants = 0;

function result(k, variant, sumVariants){
    for (var i = 1; i <= k; i++) {
        for (var j = 0; j < k; j++) {
            variant = i * i + j * j;
            if (variant == k) {
                sumVariants += 1;
                console.log(variant, i, j);
            }
            // variant = 0;
        }
    }

    console.log(sumVariants);

}

result(k, variant, sumVariants);