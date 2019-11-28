<?php

namespace Kata;

final class Addition implements Evaluable
{
    public function evaluate(Operation $operation): int
    {
        return $operation->getFirstOperand() + $operation->getSecondOperand();
    }

}
