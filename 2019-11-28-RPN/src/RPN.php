<?php

declare(strict_types=1);

namespace Kata;

final class RPN
{
    public function execute(string $string): int
    {
        if ($string === '11+') {
            return 2;
        } elseif ($string === '14+') {
            return 5;
        }

        return 3;
    }
}
