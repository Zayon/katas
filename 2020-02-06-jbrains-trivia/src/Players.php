<?php

declare(strict_types=1);

final class Players implements \Iterator, \Countable
{
    /** @var Player[] */
    private array $players;

    private int $index = 0;

    public function current(): Player
    {
        return $this->players[$this->index];
    }

    public function next(): Player
    {
        if (++$this->index === count($this->players)) {
            $this->index = 0;
        }

        return $this->players[$this->index];
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return $this->index < count($this->players);
    }

    public function rewind(): Player
    {
        if (--$this->index === count($this->players)) {
            $this->index = 0;
        }

        return $this->players[$this->index];
    }

    public function add(Player $player): void
    {
        $this->players[] = $player;
    }

    public function count(): int
    {
        return \count($this->players);
    }
}
