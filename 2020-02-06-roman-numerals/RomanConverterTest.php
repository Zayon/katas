<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'RomanConverter.php';

final class RomanConverterTest extends TestCase
{
    /** @test
     * @dataProvider mapping
     */
    public function it_converts(int $arabic, string $roman): void
    {
        $result = (new RomanConverter())->convert($arabic);

        static::assertSame($roman, $result);
    }

    public function mapping(): array
    {
        return [
            '1 in I' => [1, 'I'],
            '2 in II' => [2, 'II'],
            '3 in III' => [3, 'III'],
            '4 in IV' => [4, 'IV'],
            '5 in V' => [5, 'V'],
            '6 in VI' => [6, 'VI'],
            '10 in X' => [10, 'X'],
            '11 in XI' => [11, 'XI'],
            '15 in XV' => [15, 'XV'],
            '16 in XVI' => [16, 'XVI'],
            '20 in XX' => [20, 'XX'],
            '25 in XXV' => [25, 'XXV'],
            '37 in XXXVII' => [37, 'XXXVII'],
            '9 in IX' => [9, 'IX'],
            '19 in XIX' => [19, 'XIX'],
            '14 in XIV' => [14, 'XIV'],
            '24 in XXIV' => [24, 'XXIV'],
            '40 in XL' => [40, 'XL'],
            '50 in L' => [50, 'L'],
            '51 in LI' => [51, 'LI'],
            '69 in LXIX' => [69, 'LXIX'],
            '2469 in MMCDLXIX' => [2469, 'MMCDLXIX'],
        ];
    }
}
