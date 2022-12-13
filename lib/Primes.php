<?php

class Primes
{
    const DIR = __DIR__ . '/../assets/primes/';
    const STEP = 100000;

    private int $maxPrime = 0;

    /**
     * The primes are stored in files named by index. each file contains primes between (index * 100 000) and (index+1)*100 000.
     */
    private array $files;

    public function __construct()
    {
        $this->files = array_values(array_diff(scandir(self::DIR), ['..', '.'])); // Sorted ascending by default
        $this->maxPrime = count($this->files) * self::STEP;
    }

    public function getPrimesUpTo(int $n): array
    {
        if ($n > $this->maxPrime) {
            $this->calculatePrimesUpTo($n);
        }
        $max = 0;
        $i = 0;
        $primes = [];
        while ($max < $n) {
            $primes = array_merge($primes, explode(',', file_get_contents(self::DIR . $this->files[$i])));
            $i++;
            $max = $i * self::STEP;
        }

        return array_filter($primes, function ($p) use ($n) {
            return $p <= $n;
        });
    }

    private function calculatePrimesUpTo($n)
    {
        $primes = [];
        foreach ($this->files as $file) {
            $primes = array_merge($primes, explode(',', file_get_contents(self::DIR . $file)));
        }

        while (end($primes) < $n) {
            $primes =  $this->getNextBatchOfPrimes($primes);
        }
    }

    private function getNextBatchOfPrimes(array $primes): array
    {
        $nb = count($this->files);

        $start = $nb * self::STEP + 1;
        $numbers = array_fill($start, self::STEP, true);

        $this->filterNumbersWithKnownPrimes($numbers, $primes, $start);

        $newPrimes = array_keys(array_filter($numbers));

        $fileName = str_pad($nb, 3, "0", STR_PAD_LEFT);

        file_put_contents(self::DIR . $fileName, implode(',', $newPrimes));
        $this->files[] = $fileName;

        return array_merge($primes, $newPrimes);
    }

    private function filterNumbersWithKnownPrimes(array &$numbers, array $primes, int $start)
    {
        $end = $start + self::STEP;

        for ($p = 0; $primes[$p] < sqrt($end); $p++) {
            $prime = $primes[$p];
            $lowestMultiple = $start % $prime == 0 ? $start : $start + $prime - $start % $prime;
            for ($i = $lowestMultiple; $i <= $end; $i += $prime) {
                $numbers[$i] = false;
            }
        }
    }
}
