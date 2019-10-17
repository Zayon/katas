<?php

declare(strict_types=1);

function add(string $str): int
{
    $secondNumber = (int) explode(',', $str)[1];
    $firstNumber = (int) explode(',', $str)[0];

    return $firstNumber + $secondNumber;
}
