<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @test */
    public function it_tests(): void
    {
        srand(128937129837);

        ob_start();
        include 'goldenMaster/GameRunner.php';
        $expected = ob_get_flush();

        srand(128937129837);

        ob_start();
        include __DIR__.'/../src/GameRunner.php';
        $result = ob_get_flush();

        static::assertSame(
            $expected,
            $result
        );
    }
}
