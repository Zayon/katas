<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once 'kata.php';

class TestKata extends TestCase
{
    /** @test */
    public function it_should_display_an_empty_list(): void
    {
        $periods = new Periods();
        $periods->merge();

        self::assertCount(0, $periods);
    }

    /** @test */
    public function it_should_display_a_period_if_only_one_exist(): void
    {
        $periods = new Periods(
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/01'),
                DateTimeImmutable::createFromFormat('d/m', '31/01'),
                0)
            );
        $periods->merge();

        self::assertCount(1, $periods);
    }

    /** @test */
    public function it_should_merge_periods_if_following_and_zero_rate(): void
    {
        $expectedPeriods = new Periods(
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/01'),
                DateTimeImmutable::createFromFormat('d/m', '28/02'),
                0
            )
        );

        $periods = new Periods(
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/01'),
                DateTimeImmutable::createFromFormat('d/m', '31/01'),
                0
            ),
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/02'),
                DateTimeImmutable::createFromFormat('d/m', '28/02'),
                0
            )
        );
        self::assertCount(2, $periods);
        $periods->merge();
        self::assertCount(1, $periods);
    }

    /** @test */
    public function it_should_not_merge_periods_if_following_and_rates_not_zero(): void
    {
        $periods = new Periods(
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/01'),
                DateTimeImmutable::createFromFormat('d/m', '31/01'),
                0
            ),
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/02'),
                DateTimeImmutable::createFromFormat('d/m', '28/02'),
                12
            )
        );
        self::assertCount(2, $periods);
        $periods->merge();
        self::assertCount(2, $periods);
    }

    /** @test */
    public function it_should_merge_only_if_periods_are_following_and_rates_zero(): void
    {
        $periods = new Periods(
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/01'),
                DateTimeImmutable::createFromFormat('d/m', '31/01'),
                0
            ),
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/02'),
                DateTimeImmutable::createFromFormat('d/m', '28/02'),
                0
            ),
            new Period(
                DateTimeImmutable::createFromFormat('d/m', '01/03'),
                DateTimeImmutable::createFromFormat('d/m', '31/03'),
                27
            )
        );

        self::assertCount(3, $periods);
        $periods->merge();
        self::assertCount(2, $periods);
    }
}
