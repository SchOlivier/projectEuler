<?php

// By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
// What is the 10 001st prime number?
$nth = 101;
$n = $nth ** 2;

$something = false;

// init primes :
$primes = array_fill(2, $nth, true);
for ($i = 2; $i <= $nth; $i++) {
    if ($primes[$i]) {
        for ($j = $i ** 2; $j <= $n; $j += $i) {
            $primes[$j] = false;
        }
    }
}
$primes = array_keys(array_filter($primes));

$k = 1;
while (count($primes) < 10001) {
    $numbers = array_fill($k * $nth + 1, $nth, true);
    filterNumbersWithKnownPrimes($numbers, $primes, $k * $nth + 1, ($k+1) * $nth);
    $numbers = array_filter($numbers);
    $primes = array_merge($primes, array_keys($numbers));
    $k++;
}

echo "\n 10 001th prime : " . $primes[10000] . "\n";

function filterNumbersWithKnownPrimes(array &$numbers, $primes, int $min, int $max)
{
    foreach ($primes as $prime) {
        $lowestMultiple = getLowestMultiple($prime, $min);
        for ($i = $lowestMultiple; $i <= $max; $i += $prime) {
            $numbers[$i] = false;
        }
    }
}

function getLowestMultiple(int $prime, int $min): int
{
    if($min % $prime == 0) return $min;
    return $min + $prime - $min % $prime;
}


$primes = array_fill(2, $n, true);
for ($i = 2; $i <= $nth; $i++) {
    if ($primes[$i]) {
        for ($j = $i ** 2; $j <= $n; $j += $i) {
            $primes[$j] = false;
        }
    }
}
