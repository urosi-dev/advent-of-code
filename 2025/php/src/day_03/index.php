<?php

namespace App\day_03;

use App\Solution;

function solve(string $input): Solution
{
    $p1 = 0;
    $p2 = 0;

    foreach (array_filter(explode("\n", $input)) as $row) {
        $idx = 0;
        $largest = "00";

        for ($i = 0; $i < strlen($row) - 1; $i++) {
            if ((int)$row[$i] > (int)$largest[0]) {
                $largest[0] = $row[$i];
                $idx = $i;
            }
        }

        for ($i = $idx + 1; $i < strlen($row); $i++) {
            if ((int)$row[$i] > (int)$largest[1])
                $largest[1] = $row[$i];
        }

        $p1 += (int)$largest;
    }

    return new Solution($p1, $p2);
}
