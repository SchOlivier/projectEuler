<?php

const queueSize = 13;
$series = file_get_contents('assets/08-series');
$series = str_split($series);

// The four adjacent digits in the 1000-digit number that have the greatest product are 9 × 9 × 8 × 9 = 5832.
// Find the thirteen adjacent digits in the 1000-digit number that have the greatest product. What is the value of this product?



$queue = [];
$maxProduct = 1;

for($i = 0; $i < queueSize; $i++){
    $queue[] = array_shift($series);
}

$maxProduct = array_product($queue);

while(!empty($series)) {
    array_shift($queue);
    $queue[] = array_shift($series);
    
    $maxProduct = max($maxProduct, array_product($queue));
}
echo "\nMax product : $maxProduct\n";
