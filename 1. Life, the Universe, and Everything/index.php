<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vitaliiyehorov
 * Date: 22.03.18
 * Time: 15:07
 */

while(1) {
    fscanf(STDIN,"%d",$n);
    if ($n == 42) break;
    print "$n\n";
}