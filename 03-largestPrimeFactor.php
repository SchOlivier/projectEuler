<?php

// The prime factors of 13195 are 5, 7, 13 and 29.
// What is the largest prime factor of the number 600851475143 ?

$primes = explode(',', file_get_contents('assets/primeNumbers.txt'));

//Example :
$n = 600851475143;

$i = -1;

while ($n != 1) {
    $i++;
    while ($n % $primes[$i] == 0) {
        $n /= $primes[$i];
    }
}

echo "\nLargest : " . $primes[$i] . "\n";