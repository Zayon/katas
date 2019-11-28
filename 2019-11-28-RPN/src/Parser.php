<?php

declare(strict_types=1);

namespace Kata;

interface Parser
{
    /** @return Operation */
    public function parse(string $notation): Operation;
}
