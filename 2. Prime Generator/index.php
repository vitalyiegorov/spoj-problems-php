<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vitaliiyehorov
 * Date: 22.03.18
 * Time: 15:07
 */

while (1) {
    // Reset
    $m = $n = null;

    // Read input
    fscanf(STDIN, "%d %d", $m, $n);

    // Set default constrains for second empty argument
    $n = $n ?? $m;

    // numbers to be checked as prime
    for ($i = $m; $i <= $n; $i++) {

        $counter = 0;
        // Check all divisible factors
        for ($j = 1; $j <= $i; $j++) {
            if ($i % $j === 0) {
                $counter++;
            }
        }

        // prime requires 2 rules ( divisible by 1 and divisible by itself)
        if ($counter === 2) {
            print "$i\n";
        }
    }
}
