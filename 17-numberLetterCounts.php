<?php

/*
If the numbers 1 to 5 are written out in words: one, two, three, four, five, then there are 3 + 3 + 5 + 4 + 4 = 19 letters used in total.
If all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many letters would be used?
NOTE: Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20 letters.
The use of "and" when writing out numbers is in compliance with British usage.
*/

const letters = [
    1    => 'one',
    2    => 'two',
    3    => 'three',
    4    => 'four',
    5    => 'five',
    6    => 'six',
    7    => 'seven',
    8    => 'eight',
    9    => 'nine',
    10   => 'ten',
    11   => 'eleven',
    12   => 'twelve',
    13   => 'thirteen',
    14   => 'fourteen',
    15   => 'fifteen',
    16   => 'sixteen',
    17   => 'seventeen',
    18   => 'eighteen',
    19   => 'nineteen',
    20   => 'twenty',
    30   => 'thirty',
    40   => 'forty',
    50   => 'fifty',
    60   => 'sixty',
    70   => 'seventy',
    80   => 'eighty',
    90   => 'ninety',
    100  => 'hundred',
    1000 => 'thousand'
];

$count = 0;
for($i = 1; $i <= 1000; $i++){
    $count += strlen(preg_replace('/\s/', '', numberToWords($i)));
}

echo $count;

function numberToWords(int $n): string
{
    if ($n == 1000) return 'one thousand';
    if ($n < 100) return getLowerThanHundred($n);

    if ($n < 1000) {
        return getLowerThanThousand($n);
    }

    throw new Exception("The method is not implemented for numbers higher than 1000");
}

function getLowerThanHundred(int $n): string
{
    if ($n <= 20) return letters[$n];
    $units = $n % 10;
    $tens = $n - $units;
    $words = letters[$tens];
    if($units > 0) $words .= ' ' . letters[$units];
    return $words;
}

function getLowerThanThousand(int $n): string
{
    $lt100 = $n % 100;
    $hundreds = ($n - $lt100) / 100;
    $words = letters[$hundreds] . ' ' . letters[100];
    if ($lt100 > 0) $words .= ' and ' .  getLowerThanHundred($lt100);
    return $words;
}
