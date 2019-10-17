<?php

declare(strict_types=1);

function add(string $str): int
{
    return (int) str_replace('0,', '', $str);
}
