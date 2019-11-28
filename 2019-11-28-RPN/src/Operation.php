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
        int $secondOperand,
        int $firstOperand,
        string $operator
    ) {
        $this->secondOperand = $secondOperand;
        $this->firstOperand  = $firstOperand;
        $this->operator = $operator;
    }

    public function evaluate(): int
    {
        if ($this->operator === '+') {
            return $this->firstOperand + $this->secondOperand;
        }

        return 0;
    }
}
