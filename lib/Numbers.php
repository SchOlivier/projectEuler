<?php

class Numbers
{
    public static function getFactors(int $n, bool $includeN = true): array
    {
        $factors = [1];
        if ($includeN) $factors[] = $n;

        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                $factors[] = $i;
                $factors[] = $n / $i;
            }
        }

        sort($factors);
        return $factors;
    }
}
