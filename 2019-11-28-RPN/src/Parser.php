<?php

declare(strict_types=1);

namespace Kata;

interface Parser
{
    /** @return int[] */
    public function parse(string $notation): array;
}
