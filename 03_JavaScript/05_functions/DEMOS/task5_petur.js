function returnReverse(param){
	let num = +param;
    // var text = num.toString();
    var text = num.toString().split("").reverse().join("");
    return text;
}

console.log(returnReverse('123.00'));