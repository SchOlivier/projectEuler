<?php

// The following iterative sequence is defined for the set of positive integers:

//     n → n/2 (n is even)
//     n → 3n + 1 (n is odd)

//     Using the rule above and starting with 13, we generate the following sequence:
//     13 → 40 → 20 → 10 → 5 → 16 → 8 → 4 → 2 → 1

//     It can be seen that this sequence (starting at 13 and finishing at 1) contains 10 terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.
//     Which starting number, under one million, produces the longest chain?
//     NOTE: Once the chain starts the terms are allowed to go above one million.

$allSequences = [
    1 => 1
];

$longestChain = 1;
$maxN = 1;


for ($n = 2; $n < 1e6; $n++) {
    if (countSequenceLength($n, $allSequences) > $longestChain) {
        $longestChain = $allSequences[$n];
        $maxN = $n;
    }
}

echo "\nLongest sequence starts with $maxN, length of $longestChain\n";
displaySequence($maxN);

function countSequenceLength(int $n0, array &$allSequences): int
{
    if (isset($allSequences[$n0])) return $allSequences[$n0];

    $n = $n0;
    $sequence = [$n];
    while ($n != 1) {
        $n = $n % 2 == 0 ? $n / 2 : 3 * $n + 1;
        if (isset($allSequences[$n])) break;
        $sequence[] = $n;
    }

    $length = count($sequence) + $allSequences[$n];
    foreach ($sequence as $i => $item) {
        if ($item < 1e6) {
            $allSequences[$item] = $length - $i;
        }
    }

    return $allSequences[$n0];
}

function displaySequence(int $n)
{
    echo "$n,";
    while ($n > 1) {
        $n = $n % 2 == 0 ? $n / 2 : 3 * $n + 1;
        echo ", $n";
    }
    echo "\n";
}
