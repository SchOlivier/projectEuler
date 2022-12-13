<?php

// A Pythagorean triplet is a set of three natural numbers, a < b < c, for which  a² + b² = c²
// For example, 3² + 4² = 9 + 16 = 25 = 5².

// There exists exactly one Pythagorean triplet for which a + b + c = 1000.
// Find the product abc.

for($c = 500 ; $c > 0; $c --){
    for($b = $c -1; $b > $c/2; $b--){
        $a = 1000 - $b - $c;
        if($a**2 + $b**2 == $c**2){
            echo "\na : $a, b : $b, c : $c\n";
            echo "a² + b²: " . $a**2 + $b**2 . ", c² : ". $c**2 . "\n";
            echo "product abc : " . $a*$b*$c . "\n";
            die();
        }
    }
}