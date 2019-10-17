<?php

declare(strict_types=1);

function add(string $str): int
{
    $array = explode(',', $str);

    return array_sum($array);
}
