//елементът с най+много повторения в масима
var arr1=[2, 12, 2, 2, 25, 12], mf = 1, m = 0, item;
   for (var i=0; i<arr1.length; i++)
   {
           for (var j=i; j<arr1.length; j++)
           {
                   if (arr1[i] == arr1[j])
                    m++;
                   if (mf<m)
                   {
                     mf=m; 
                     item = arr1[i];
                   }
           }
           m=0;
   }
   console.log(item+" ( " +mf +" times ) ") ;