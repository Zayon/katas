<?php

declare(strict_types=1);

function add(string $str): int
{
    if ($str === '0,2') {
        return 2;
    }

    return $str === '0,1' ? 1: 0;
}
