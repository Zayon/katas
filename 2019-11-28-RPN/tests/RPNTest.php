<?php

use Kata\Addition;
use Kata\ArabicNotationParser;
use Kata\Division;
use Kata\Multiplication;
use Kata\OperationEvaluator;
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
        self::assertSame($expectedOutput, $this->getRPN()->execute($input, new ArabicNotationParser()));
    }

    /**
     * @test
     *
     * @throws
     */
    public function it_cannot_divide_by_zero(): void
    {
        $this->expectError();
        $this->getRPN()->execute('1 0 /', new ArabicNotationParser());
    }

    /**
     * @test
     *
     * @throws
     */
    public function it_divides_6_by_3(): void
    {
        self::assertSame(2, $this->getRPN()->execute('6 3 /', new ArabicNotationParser()));
    }

    /** @test */
    public function it_multiplies_3_and_2(): void
    {
        self::assertSame(6, $this->getRPN()->execute('3 2 *', new ArabicNotationParser()));
    }

    /**
     *
     * @return RPN
     */
    private function getRPN(): RPN
    {
        return (new RPN(
            new OperationEvaluator(
                [
                    new Addition(),
                    new Division(),
                    new Multiplication()
                ]
            )
        ));
    }
}
