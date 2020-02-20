<?php

declare(strict_types=1);

final class Player
{
    private string $name;
    private int $place;
    private int $coins;
    private bool $inPenaltyBox;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->place = 0;
        $this->coins = 0;
        $this->inPenaltyBox = false;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function isInPenaltyBox(): bool
    {
        return $this->inPenaltyBox;
    }

    public function getPlace(): int
    {
        return $this->place;
    }

    public function setPlace(int $newPlace): void
    {
        $this->place = $newPlace;
    }

    public function addCoin(): void
    {
        $this->coins++;
    }

    public function getNumberOfCoins(): int
    {
        return $this->coins;
    }

    public function putInPenaltyBox(): void
    {
        $this->inPenaltyBox = true;
    }
}
