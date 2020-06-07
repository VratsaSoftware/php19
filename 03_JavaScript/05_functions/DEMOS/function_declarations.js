function toCelsius(fahrenheit) {
  return (5/9) * (fahrenheit-32);
}

var x = toCelsius(77),
    text = "The temperature is " + x + " Celsius";


console.log( text )