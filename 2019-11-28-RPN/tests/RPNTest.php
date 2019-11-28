<?php

use Kata\ArabicNotationParser;
use Kata\RPN;
use PHPUnit\Framework\TestCase;

final class RPNTest extends TestCase
{
    public function arabicNotationAdditionProvider(): array
    {
        return [
            ['1 1 +', 2],
            ['1 2 +', 3],
            ['1 3 +', 4],
            ['1 4 +', 5],
            ['1 5 +', 6],
            ['1 6 +', 7],
            ['1 7 +', 8],
            ['1 8 +', 9],
            ['1 9 +', 10],
            ['1 10 +', 11],
        ];
    }

    /**
     * @test
     * @dataProvider arabicNotationAdditionProvider
     */
    public function it_adds_correctly_with_arabic_notation(string $input, int $expectedOutput): void
    {
        self::assertSame($expectedOutput, (new RPN())->execute($input, new ArabicNotationParser()));
    }

    /** @test */
    public function it_mutiplies_3_and_2(): void
    {
        self::assertSame(6, (new RPN())->execute('3 2 *', new ArabicNotationParser()));
    }
}
