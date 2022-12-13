<?php

// The sum of the squares of the first ten natural numbers is
//  1² + 2² + ... + 10² = 385

// The square of the sum of the first ten natural numbers is,
// (1 + 2 + ... + 10)² = 55² = 3025;
// Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is .
// 3025 - 385 = 2640
// Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.

$n = 100;

$sumOfSquares = $n * ($n+1) * (2*$n+1) / 6;
$squareOfSum = ($n * ($n+1) / 2)**2;

echo "\n Difference : " . $squareOfSum - $sumOfSquares . "\n";