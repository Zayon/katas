<?php

declare(strict_types=1);

function add(string $str): int
{
    $secondNumber = explode(',', $str)[1];

    return (int) $secondNumber;
}
