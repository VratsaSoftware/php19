var numbers = [], letters = [];

for ( let i = 1000; i <= 9999; i++ ) {
    
    let number = i.toString();
    // console.log(number)
    if ((+number[0] + (+number[1])) === (+number[2] + (+number[3]))) {
        numbers.push(number);
    }
}

console.log(numbers.length);


