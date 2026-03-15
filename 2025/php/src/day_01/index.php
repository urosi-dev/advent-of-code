<?php

namespace App\day_01;

use App\Solution;

function divmod(int $a, int $b): array {
    $q = floor($a / $b);
    $r = $a - $q * $b;
    return [$q, $r];
}

function solve(string $input): Solution
{
    $current = 50;
    $p1 = 0;
    $p2 = 0;

    foreach (array_filter(explode("\n", $input)) as $row) {
        $dir = $row[0];
        $value = (int) substr($row, 1);

        $delta = $dir === "L" ? -$value : $value;

        $p2 += intdiv(abs($current + $delta), 100);

        if ($current !== 0 && $current + $delta <= 0)
            $p2++;

        $current = (($current + $delta) % 100 + 100) % 100;

        if ($current === 0)
            $p1++;
    }

    return new Solution($p1, $p2);
}
