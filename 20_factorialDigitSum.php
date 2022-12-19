<?php

/*
n! means n × (n − 1) × ... × 3 × 2 × 1

For example, 10! = 10 × 9 × ... × 3 × 2 × 1 = 3628800,
and the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.

Find the sum of the digits in the number 100!
*/

$n = 100;

$digits = [1];
for ($i = 2; $i <= $n; $i++) {
    $carryOver = 0;
    foreach ($digits as $j => $d) {
        $d *= $i;
        $digits[$j] = ($d + $carryOver) % 10;
        $carryOver = floor(($d + $carryOver) / 10);
    }
    if ($carryOver) {
        while ($carryOver >= 10) {
            $digits[] = $carryOver % 10;
            $carryOver = floor($carryOver / 10);
        }
        $digits[] = $carryOver;
    };

    // echo "$i : " . implode('', array_reverse($digits)) . "\n";
}

echo array_sum($digits);
