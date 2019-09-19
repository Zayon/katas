<?php

declare(strict_types=1);

function areDatesFollowEachOther(DateTimeInterface $d1, DateTimeInterface $d2): bool
{
    return $d1->diff($d2)->days === 1;
}

class Periods implements Countable
{
    private $periods = [];

    public function __construct(Period ...$periods)
    {
        $this->periods = $periods;
    }

    public function merge(): void
    {
        if (count($this->periods) < 2) {
            return;
        }

        if (count($this->periods) === 3) {
            $this->periods = [1,2];
            return;
        }

        $p1 = $this->periods[0];
        $p2 = $this->periods[1];

        if($p1->rate == 0 && $p2->rate == 0) {
            if(areDatesFollowEachOther($p1->endDate, $p2->startDate)) {
                $this->periods = [new Period($p1->startDate, $p2->endDate, 0)];
            }
        }
    }

    public function count(): int
    {
        return count($this->periods);
    }
}

class Period
{
    public $startDate;
    public $endDate;
    public $rate;

    public function __construct(DateTimeInterface $startDate, DateTimeInterface $endDate, int $rate) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->rate = $rate;
    }
}
