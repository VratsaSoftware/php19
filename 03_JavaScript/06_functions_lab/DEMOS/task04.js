
function isTrion(input)
{
    var num = len,
        len = input.length,
        output='yes',
        up,
        previous, next;

    if ( len > 2 ){
        ( input[0] < input[1] ) ? up = true : up = false;
        for ( let i = 1; i < len-1; ){
            previous  = input[i-1];
            next      = input[i+1];
            if ( up === true ){
                if ( ( input[i] >= previous ) && ( input[i] >= next ) ){
                    i++; 
                } else {
                    output = 'no';
                    i = len;
                }
                up = false;
            } else {
                if ( ( input[i] <= previous ) && ( input[i] <= next ) ){
                    i++;
                }else{
                    output = 'no';
                    i = len;
                }
                up = true;
            }
        }
    }
    console.log( "is that TRION? - " + output );
}

isTrion( [1, 2, 1, 6, 7] );