<?php

declare(strict_types=1);

namespace Kata;

final class RPN
{
    public function execute(string $string): int
    {
        [$number1, $number2] = $this->parse($string);

        return $number1 + $number2;
    }

    /**
     * @param string $string
     *
     * @return int[]
     */
    private function parse(string $string): array
    {
        [$number1, $number2] = explode(' ', $string);

        return [
            (int) $number1,
            (int) $number2
        ];
    }
}
