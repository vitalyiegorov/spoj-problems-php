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
function getPrimes(int $end = PHP_INT_MAX, array &$primes = [2, 3, 5, 7, 11, 13, 17]): array
{
    $primesCount = count($primes);
    $maxPrime = max($primes) - 1;

    // Iterate from maximum existing prime number + 1 to limit
    for ($i = $maxPrime; $i <= $end; $i++) {
        $isPrime = true;
        $cap = sqrt($i) + 1;

        // Check division with existing primes
        for ($j = 0; $j < $primesCount; $j++) {
            if ($isPrime && ($i % $primes[$j] === 0)) {
                $isPrime = false;
            }

            if ($j >= $cap) {
                break;
            }
        }

        if ($isPrime) {
            $primes[$primesCount++] = $i;
        }
    }

    return $primes;
}

$output = '';

// For caching
$primes = [2, 3, 5, 7, 11, 13, 17];

// Read amount of data
fscanf(STDIN, "%d", $t);

for ($i = 0; $i < $t; $i++) {
    // Read inputs
    fscanf(STDIN, "%d %d", $m, $n);


    // Set default constrains for second empty argument
    $n = (int)($n ?? $m);

    $primes = getPrimes($n, $primes);


    foreach ($primes as $prime) {
        if ($m <= $prime && $prime <= $n) {
            $output .= $prime . "\n";
        }
    }

    if ($i + 1 < $t) {
        $output .= "\n";
    }
}

print $output;