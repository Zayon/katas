<?php

declare(strict_types=1);

function add(string $str): int
{
    $explode = explode(',', $str);
    $secondNumber = $explode[1];
    if ($secondNumber === '0') {
        return (int) $explode[0];
    }

    return (int) $secondNumber;
}
