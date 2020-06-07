function getLastDigit( param ){
var toText = param.toString(); //convert to string
// var lastChar = toText.slice(-1); //gets last character
var lastDigit = param % 10;
// var lastDigit = +(lastChar); //convert last character to number
switch ( lastDigit ) {
    case 0:
        return 'zero';
        break;
    case 1:
        return 'one';
        break;
    case 2:
    return 'two';
    break;
    case 3:
    return 'three';
    break;
    case 4:
    return 'four';
    break;
    case 5:
    return 'five';
    break;
    case 6:
    return 'six';
    break;
    case 7:
    return 'seven';
    break;
    case 8:
    return 'eight';
    break;
}
}
console.log(getLastDigit( '512' ));

console.log('4343433a' % 10)