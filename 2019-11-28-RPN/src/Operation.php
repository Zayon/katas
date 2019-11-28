<?php

namespace Kata;

final class Operation
{
    /**
     * @var int
     */
    private $secondOperand;

    /**
     * @var int
     */
    private $firstOperand;

    /**
     * Operation constructor.
     *
     * @param int $secondOperand
     * @param int $firstOperand
     */
    public function __construct(int $secondOperand, int $firstOperand)
    {
        $this->secondOperand = $secondOperand;
        $this->firstOperand  = $firstOperand;
    }

    public function evaluate(): int
    {
        return $this->firstOperand + $this->secondOperand;
    }
}
