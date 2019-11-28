<?php

namespace Kata;

final class Operation
{
    /** @var int */
    private $secondOperand;

    /** @var int */
    private $firstOperand;

    /** @var string */
    private $operator;

    public function __construct(
        int $firstOperand,
        int $secondOperand,
        string $operator
    ) {
        $this->firstOperand  = $firstOperand;
        $this->secondOperand = $secondOperand;
        $this->operator      = $operator;
    }

    public function evaluate(): int
    {
        if ($this->operator === '+') {
            return $this->firstOperand + $this->secondOperand;
        }

        if ($this->operator === '/') {
            return $this->firstOperand / $this->secondOperand;
        }

        return $this->firstOperand * $this->secondOperand;
    }
}
