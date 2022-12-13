<?php

// A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is 9009 = 91 × 99.
// Find the largest palindrome made from the product of two 3-digit numbers.

$largestPalindrome = 0;
for ($i = 999; $i > 0; $i--) {
    for($j = $i;$j>0; $j--) {
        if (isPalindrome($i * $j)) {
            $largestPalindrome = max($largestPalindrome, $i * $j);
        }
    }
}
echo "\n largest Palindrome : $largestPalindrome\n";

function isPalindrome(int $n): bool
{
    if ($n > 0 && $n % 10 == 0) return false;

    $digits = [];
    while ($n >= 10) {
        $digits[] = $n % 10;
        $n = floor($n / 10);
    }
    $digits[] = $n;

    $nb = count($digits) - 1;
    $i = 0;

    while ($nb > $i) {
        if ($digits[$i] != $digits[$nb]) return false;
        $nb--;
        $i++;
    }

    return true;
}
