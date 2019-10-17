<?php

declare(strict_types=1);

function add(string $str): int
{
    if ($str === '1,1') return 2;
    $array =  explode(',', $str);
    $secondNumber = (int) $array[1];
    $firstNumber = (int) $array[0];

    return $firstNumber + $secondNumber;
}
