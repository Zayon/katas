<?php

namespace Kata;

interface Evaluable
{
    public function canEvaluate($operator): bool;

    public function evaluate(Operation $operation): int;
}
