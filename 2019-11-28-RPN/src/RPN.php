<?php

declare(strict_types=1);

namespace Kata;

final class RPN
{
    /**
     * @var OperationEvaluator
     */
    private $operationEvaluator;

    public function __construct(OperationEvaluator $operationEvaluator)
    {
        $this->operationEvaluator = $operationEvaluator;
    }

    public function execute(string $string, Parser $parser): int
    {
        $operation = $parser->parse($string);

        return $this->operationEvaluator->evaluate($operation);
    }
}
