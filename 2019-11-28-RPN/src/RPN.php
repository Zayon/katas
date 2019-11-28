<?php

declare(strict_types=1);

namespace Kata;

final class RPN
{
    public function execute(string $string, Parser $parser): int
    {
        [$number1, $number2] = $parser->parse($string);

        return $number1 + $number2;
    }
}
