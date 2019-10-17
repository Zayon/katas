<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'addition.php';

final class AdditionTest extends TestCase
{
    /** @test */
    public function zero_plus_zero_equals_zero(): void
    {
        self::assertSame(0, add('0,0'));
    }

    /** @test */
    public function zero_plus_one_equals_one(): void
    {
        self::assertSame(1, add('0,1'));
    }

    /** @test */
    public function zero_plus_two_equals_two(): void
    {
        self::assertSame(2, add('0,2'));
    }

    /** @test */
    public function one_plus_zero_equals_one(): void
    {
        self::assertSame(1, add('1,0'));
    }

    /** @test */
    public function one_plus_one_equals_two(): void
    {
        self::assertSame(2, add('1,1'));
    }

    /** @test */
    public function one_plus_two_plus_three_equals_six(): void
    {
        self::assertSame(6, add('1,2,3'));
    }

    /** @test */
    public function one_plus_two_plus_three_equals_six_with_delimiter(): void
    {
        self::assertSame(6, add(',#1,2,3'));
    }

    /** @test */
    public function one_plus_two_plus_three_equals_pipesix_with_delimiter(): void
    {
        self::assertSame(6, add('|#1|2|3'));
    }

    /** @test */
    public function one_plus_two_plus_tdsfhree_equals_pipesix_with_delimiter(): void
    {
        self::assertSame(6, add('||#1||2||3'));
    }

    /** @test */
    public function one_plus_two_plus_asdftdsfhree_equals_pipesix_with_delimiter(): void
    {
        self::assertSame(7, add('||#1||2||4'));
    }
}
