<?php

//Work out the first ten digits of the sum of the following one-hundred 50-digit numbers.

$numbersAsString = [];
require 'assets/13-largeNumbers.php';

$splitNumbers = [];

$splitResult = [];
$carryOver = 0;
for ($i = 0; $i < 5; $i++) {
    $sum = $carryOver;
    foreach ($numbersAsString as $number) {
        $tenDigitNumber = (int) substr($number, 40 - $i * 10, 10);
        $sum += $tenDigitNumber;
    }
    $splitResult[$i] = $sum % 1e10;
    $carryOver = floor($sum / 1e10);
}

$fullNumber = (string) $carryOver;

for ($i = 4; $i >= 0; $i--) {
    $fullNumber .= ', ' . str_pad($splitResult[$i], 10, "0", STR_PAD_LEFT);
}

echo $fullNumber;
// 55, 3737623039, 0876637302, 0487468329, 8597177365, 9831892672
// => 5537376230