<?php

declare(strict_types=1);

function add(string $str): int
{
    $secondNumber = explode(',', $str)[1];
    if ($secondNumber === '0') {
        return (int) explode(',', $str)[0];
    }

    return (int) $secondNumber;
}
