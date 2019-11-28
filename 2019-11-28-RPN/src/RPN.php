<?php

declare(strict_types=1);

namespace Kata;

final class RPN
{
    public function execute(string $string): int
    {
        return $string[0] + $string[1];
    }
}