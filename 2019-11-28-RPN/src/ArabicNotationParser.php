<?php

declare(strict_types=1);

namespace Kata;

final class ArabicNotationParser implements Parser
{
    public function parse(string $notation): array
    {
        [$number1, $number2] = explode(' ', $notation);

        return [
            (int) $number1,
            (int) $number2
        ];
    }
}
