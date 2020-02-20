<?php

declare(strict_types=1);

final class QuestionStack
{
    private int $index = 0;
    private string $category;

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public function next(): string
    {
        return $this->category.' Question '.$this->index++;
    }
}
