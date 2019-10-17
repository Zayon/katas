<?php

declare(strict_types=1);

function add(string $str): int
{
    $array = explode(',', $str);
    $secondNumber = $array[1];
    if ($secondNumber === '0') {
        return (int) $array[0];
    }

    return (int) $secondNumber;
}
