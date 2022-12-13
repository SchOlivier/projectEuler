<?php

// If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.
// Find the sum of all the multiples of 3 or 5 below 1000.

$sum = 0;
$numbers3 = range(3, 999, 3);
$numbers5 = range(5, 999, 5);

$multiples = array_unique(array_merge($numbers3, $numbers5));
echo "\n Sum : " . array_sum($multiples) . "\n";