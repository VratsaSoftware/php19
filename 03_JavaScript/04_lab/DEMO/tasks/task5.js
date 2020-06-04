// Напишете JavaScript програма, която отпечатва 
// в конзолата думите в стринг отзад напред, 
// запазвайки последователността им.

var text = 'Life is pretty good, isn’t it?', final = '',
			splitted = text.split(' '), 
			len = splitted.length;


// console.log(splitted)

function reverseWord(s){
	// console.log(s.split('').reverse().join(''))
    return s.split("").reverse().join("");
    // return s.split("").reverse().join("");
}

        for (var i = 0; i < len; i++) {
            final += reverseWord(splitted[i]) + ' ';

            // console.log(final)
        }
       console.log( "The sentence: " + text + " reversed is: " + final)