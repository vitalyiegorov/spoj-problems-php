<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: vitaliiyehorov
 * Date: 22.03.18
 * Time: 15:07
 */

/**
 * Get prime number array.
 *
 * @param int $end Integer maximum value
 * @param array $primes Initial primes data
 * @return array Primes collection in [$start, $end] range
 */
function getPrimes(int $end = PHP_INT_MAX, array &$primes = [2, 3, 5, 7, 11, 13]): array
{
    $primesCount = count($primes);
    $maxPrime = max($primes);

    // Iterate from maximum existing prime number + 1 to limit
    for ($i = $maxPrime + 1; $i <= $end; $i++) {
        $isPrime = true;
        $cap = sqrt($i)+1;

        // Check division with existing primes
        for ($j = 0; $j < $primesCount; $j++) {
            if ($j >= $cap) {
                break;
            }

            if ($i % $primes[$j] === 0) {
                $isPrime = false;
                break;
            }
        }

        if ($isPrime) {
            $primes[$primesCount++] = $i;
        }
    }

    return $primes;
}

// For caching
$primes = [2, 3, 5, 7, 11, 13];

while (1) {
    // Reset
    $m = $n = null;

    // Read input
    fscanf(STDIN, "%d %d", $m, $n);

    // Set default constrains for second empty argument
    $n = (int)($n ?? $m);

    $primes = getPrimes($n, $primes);

    $output = '';
    foreach ($primes as $prime) {
        if ($m <= $prime && $prime <= $n) {
            $output .= $prime . "\n";
        }
    }

    print $output;
}
