<?php

declare(strict_types=1);

function add(string $str): int
{
    $array = explode(',', $str);
    $firstNumber = (int) $array[0];
    $secondNumber = (int) $array[1];
    $thirdNumber = (int) $array[2];

    return $firstNumber + $secondNumber + $thirdNumber;
}
