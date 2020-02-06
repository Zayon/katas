<?php

declare(strict_types=1);

final class RomanConverter
{
    private const map = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    public function convert(int $arabic): string
    {
        if ($arabic > 3000) {
            throw new \InvalidArgumentException('Roman number cannot excess 3000');
        }

        $roman = '';

        foreach (self::map as $key => $value) {
            while ($arabic >= $key) {
                $roman .= $value;
                $arabic -= $key;
            }
        }

        return $roman;
    }
}
