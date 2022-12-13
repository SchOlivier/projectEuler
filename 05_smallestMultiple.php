<?php

// 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
// What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?

echo "\n";

$n = 2;
for ($i = 3; $i <= 20; $i++) {
    $n = getSmallestMultiple($i, $n);
}

echo "Smallest multiple : $n\n";

function getSmallestMultiple(int $a, int $b): int
{
    $smallest = ($a * $b) / getGreatestDivisor($a, $b);
    return $smallest;
}

function getGreatestDivisor(int $a, int $b): int
{
    while ($a > 0 && $b > 0) {
        if($a > $b)
        {
            $a = $a % $b;
        } else {
            $b = $b % $a;
        }
    }
    return $a > 0 ? $a : $b;
}
