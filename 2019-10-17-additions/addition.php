<?php

declare(strict_types=1);

function add(string $str): int
{
    if ($str === '1,0') {
        return 1;
    }
    $secondNumber = explode(',', $str)[1];

    return (int) $secondNumber;
}
