<?php

/*
Using names.txt (right click and 'Save Link/Target As...'), a 46K text file containing over five-thousand first names, 
begin by sorting it into alphabetical order. 
Then working out the alphabetical value for each name, multiply this value by its alphabetical position in the list to obtain a name score.

For example, when the list is sorted into alphabetical order, COLIN, which is worth 3 + 15 + 12 + 9 + 14 = 53, is the 938th name in the list. So, COLIN would obtain a score of 938 × 53 = 49714.

What is the total of all the name scores in the file?
*/

$names = file_get_contents('assets/22_names.txt');
$names = str_replace('"', '', $names);
$names = explode(',', $names);
sort($names);

$totalSum = 0;
foreach ($names as $i => $name) {
    $nameScore = array_sum(array_map(
        function($char) {return ord($char) - ord('A') + 1;},str_split($name)
    ));
    // echo "$name : $nameScore\n";
    if($i == 937) echo "$name\n";

    $totalSum += ($i+1) * $nameScore;
    
}

echo "total Sum : $totalSum\n";
