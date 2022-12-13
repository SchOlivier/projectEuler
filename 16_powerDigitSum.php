<?php

/*
2^15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.
What is the sum of the digits of the number 21000?
*/

$n = 1000;

$digits = [1];
for ($i = 0; $i < $n; $i++) {
    $carryOver = 0;
    foreach($digits as $j => $d){
        $d *= 2;
        $digits[$j] = $d%10 + $carryOver;
        $carryOver = floor($d/10);
    }
    if($carryOver) $digits[] = $carryOver;
}

echo array_sum($digits);
