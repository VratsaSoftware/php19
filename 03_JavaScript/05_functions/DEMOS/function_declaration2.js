var text = "The temperature is " + toCelsius(77) + " Celsius";

function toCelsius( fahrenheit ) {
  return (5/9) * (fahrenheit-32);
}

console.log( text )