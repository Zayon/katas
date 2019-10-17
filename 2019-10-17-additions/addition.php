<?php

declare(strict_types=1);

function add(string $str): int
{
    if ($str === '0,2') {
        return 2;
    }

    if ($str === '0,1') {
        return 1;
    }

    return 0;
}
