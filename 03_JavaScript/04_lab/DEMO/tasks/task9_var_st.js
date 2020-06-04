let num = 1, a,b,c,d;
for (a = 1; a <= 9; a++) {
    for (b = 0; b <= 9; b++) {
        for (c = 0; c <= 9; c++) {
            d = (a + b) - c;
            if ((d <= 9) && ((a + b) === (c + d)) && (d >= 0) )
            {
                console.log(" " + a + " " + b + " " + c + " " + d);
                console.log(num)
                num++;
            }
        }
    }
}