<?php

use Kata\RPN;
use PHPUnit\Framework\TestCase;

final class RPNTest extends TestCase
{
    public function integersProvider(): array
    {
        return [
            [1, 1],
            [1, 2],
            [1, 3],
            [1, 4],
            [1, 5],
            [1, 6],
            [1, 7],
            [1, 8],
            [1, 9],
            [1, 10],
        ];
    }

    /**
     * @test
     *
     * @dataProvider integersProvider
     *
     * @param int $left
     * @param int $right
     */
    public function it_adds_correctly(int $left, int $right): void
    {
        $expectedResult = $left + $right;

        self::assertSame($expectedResult, (new RPN())->execute(sprintf('%d%d+', $left, $right)));
    }
}
