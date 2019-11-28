<?php

use Kata\RPN;
use PHPUnit\Framework\TestCase;

final class RPNTest extends TestCase
{
    /**
     * @test
     */
    public function it_adds_1_and_1(): void
    {
        self::assertSame(2, (new RPN())->execute('11+'));
    }

    /**
     * @test
     */
    public function it_adds_1_and_2(): void
    {
        self::assertSame(3, (new RPN())->execute('12+'));
    }

    /**
     * @test
     */
    public function it_adds_1_and_4(): void
    {
        self::assertSame(5, (new RPN())->execute('14+'));
    }
}
