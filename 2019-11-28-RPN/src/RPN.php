<?php

declare(strict_types=1);

namespace Kata;

final class RPN
{
    public function execute(string $string, Parser $parser): int
    {
        $operation = $parser->parse($string);

        return $operation->evaluate();
    }
}
