<?php
// In the 20×20 grid below, four numbers along a diagonal line have been marked in red.
// The product of these numbers is 26 × 63 × 78 × 14 = 1788696.
// What is the greatest product of four adjacent numbers in the same direction (up, down, left, right, or diagonally) in the 20×20 grid?

$grid = [];
require 'assets/11-grid.php';
$gridSize = count($grid); // Assumes the grid is square.

echo $gridSize . "\n";

$maxProduct = 0;
for ($i = 0; $i < $gridSize; $i++) {
    for ($j = 0; $j < $gridSize; $j++) {
        //right
        if ($i < $gridSize - 3) {
            $maxProduct = max($maxProduct, getRightProduct($grid, $i, $j));
            // right-down
            if ($j < $gridSize - 3) {
                $maxProduct = max($maxProduct, getRightDownProduct($grid, $i, $j));
            }
        }
        // down
        if ($j < $gridSize - 3) {
            $maxProduct = max($maxProduct, getDownProduct($grid, $i, $j));
            // left-down
            if ($i > 2) {
                $maxProduct = max($maxProduct, getLeftDownProduct($grid, $i, $j));
            }
        }
    }
}
echo "\n" . $maxProduct . "\n";

function getRightProduct(array $grid, int $i, int $j)
{
    $product = 1;
    for ($n = 0; $n < 4; $n++) {
        $product *= $grid[$i + $n][$j];
    }
    return $product;
}

function getRightDownProduct(array $grid, int $i, int $j)
{
    $product = 1;
    for ($n = 0; $n < 4; $n++) {
        $product *= $grid[$i + $n][$j + $n];
    }
    return $product;
}

function getDownProduct(array $grid, int $i, int $j)
{
    $product = 1;
    for ($n = 0; $n < 4; $n++) {
        $product *= $grid[$i][$j + $n];
    }
    return $product;
}

function getLeftDownProduct(array $grid, int $i, int $j)
{
    $product = 1;
    for ($n = 0; $n < 4; $n++) {
        $product *= $grid[$i - $n][$j + $n];
    }
    return $product;
}
