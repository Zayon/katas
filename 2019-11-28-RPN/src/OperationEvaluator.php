<?php

namespace Kata;

final class OperationEvaluator
{

    public function evaluate(Operation $operation): int
    {
        return $operation->evaluate();
    }
}
