<?php

namespace App\day_02;

use App\Solution;

function solve(string $input): Solution
{
    $p1 = 0;
    $p2 = 0;

    foreach (array_filter(explode(",", $input)) as $range) {
        [$first, $last] = explode("-", $range);

        for ($i = $first; $i  <= $last; $i ++) {
            $len = strlen($i);
            $half = ceil($len / 2);

            $first_half = substr($i, 0, $half);
            $second_half = substr($i, $half);

            if ($first_half === $second_half) {
                $p1 += (int)$i;
            }

            for ($j = 1; $j <= $len / 2; $j++) {
                if ($len % $j !== 0) continue;

                $pattern = substr($i, 0, $j);
                $repeat = str_repeat($pattern, intdiv($len, $j));

                if ((int)$i === (int)$repeat) {
                    $p2 += (int)$i;
                    break;
                }
            }
        }
    }

    return new Solution($p1, $p2);
}
