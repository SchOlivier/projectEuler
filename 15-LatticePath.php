<?php

// Starting in the top left corner of a 2×2 grid, and only being able to move to the right and down, there are exactly 6 routes to the bottom right corner.
// How many such routes are there through a 20×20 grid?

/**
 * N étant la taille de la grille : 2N! / (N! * N!)
 * Raisonnement :
 * On a 2N déplacements à faire. Parmi eux, N vont à droite (D), le reste va en bas. Sur une grille de 2 x 2, les possibilités sont :
 *  D D . .
 *  D . D .
 *  D . . D
 *  . D D .
 *  . D . D
 *  . . D D
 * 
 * On a 2N choix pour le premier 'D', et 2N-1 pour le second, soit 4 * 3 permutations LORSQU'ON DIFFERENCIE LES DEUX DEPLACEMENTS. i.e. :
 * "D1 D2 . . " ne serait pas la même chose que "D2 D1 . ."
 * En l'occurence on n'a pas de raison de différencier, donc il faut diviser ce nombre de permutations par les permutations possibles propres à D.
 * On divise donc par 2
 * 
 * La solution est donc (4 * 3)/2
 * 
 * Pour une grille de taille 3, un total de 6 déplacements à faire :
 *  (6 * 5 * 4) placements possibles quand on différencie les 'D'
 *  3 * 2 * 1 permutations de 'D' possibles
 * 
 * Au final on retrouve bien :
 * NbDéplacements = 2N! / (N! * N!);
 * 
 */

$n = 20;
//La flemme d'installer une librairie de calculs mathématique...
$factN = 1;
for($i = 1; $i <= $n; $i++){
    $factN *= $i;
}

$fact2N = $factN;
for($i=$n+1; $i <= 2*$n; $i++)
{
    $fact2N *= $i;
}

echo "\n" . $fact2N / $factN**2 . "\n";