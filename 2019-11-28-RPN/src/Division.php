<?php

namespace Kata;

final class Division implements Evaluable
{
    public function canEvaluate($operator): bool
    {
        return '/' === $operator;
    }

    public function evaluate(Operation $operation): int
    {
        return $operation->getFirstOperand() / $operation->getSecondOperand();
    }

}
