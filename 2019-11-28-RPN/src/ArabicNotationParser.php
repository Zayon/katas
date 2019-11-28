<?php

declare(strict_types=1);

namespace Kata;

final class ArabicNotationParser implements Parser
{
    public function parse(string $notation): Operation
    {
        [$number1, $number2, $operator] = explode(' ', $notation);

        return new Operation(
            (int) $number1,
            (int) $number2,
            $operator
        );
    }
}
