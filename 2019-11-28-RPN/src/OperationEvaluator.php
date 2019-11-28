<?php

namespace Kata;

final class OperationEvaluator implements Evaluable
{
    /**
     * @var Evaluable[]
     */
    private $evaluators;

    /**
     * OperationEvaluator constructor.
     *
     * @param Evaluable[] $evaluators
     */
    public function __construct(array $evaluators)
    {
        $this->evaluators = $evaluators;
    }

    public function canEvaluate($operator): bool
    {
        foreach ($this->evaluators as $evaluator) {
            if ($evaluator->canEvaluate($operator)) {
                return true;
            }
        }

        return false;
    }

    public function evaluate(Operation $operation): int
    {
        foreach ($this->evaluators as $evaluator) {
            if ($evaluator->canEvaluate($operation->getOperator())) {
                return $operation->evaluate();
            }
        }

        return null;
    }
}
