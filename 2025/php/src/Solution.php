<?php

namespace App;

class Solution
{
    public string|int $p1;
    public string|int $p2;

    public function __construct(string|int $p1, string|int $p2)
    {
        $this->p1 = $p1;
        $this->p2 = $p2;
    }
}
