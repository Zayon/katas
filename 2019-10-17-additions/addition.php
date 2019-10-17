<?php

declare(strict_types=1);

function add(string $str): int
{
    return array_sum(explode(',', $str));
}
