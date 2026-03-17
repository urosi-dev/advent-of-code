<?php

namespace App\day_02;

use App\Solution;

function solve(string $input): Solution
{
    $p1 = 0;
    $p2 = 0;

    foreach (array_filter(explode(",", $input)) as $range) {
        [$first, $last] = explode("-", $range);

        for ($i=$first; $i <= $last; $i++) {
            $len = strlen($i);
            $half = ceil($len / 2);

            $first_half = substr($i, 0, $half);
            $second_half = substr($i, $half);

            if ($first_half === $second_half) {
                $p1 += (int)$i;
            }
        }
    }

    return new Solution($p1, $p2);
}
