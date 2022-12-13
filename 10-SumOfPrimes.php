<?php

require 'lib/Primes.php';

// The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
// Find the sum of all the primes below two million.

$primesService = new Primes;
$primes = $primesService->getPrimesUpTo(2e6);
echo array_sum($primes);

