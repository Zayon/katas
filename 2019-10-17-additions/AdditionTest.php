<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'addition.php';

final class AdditionTest extends TestCase
{
    /** @test */
    public function zero_plus_zero_equals_zero(): void
    {
        self::assertSame(0, addition('0,0'));
    }
}
