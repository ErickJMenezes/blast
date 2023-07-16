<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Statement;

class FunctionDeclaration extends Statement
{
    public function __construct(
        public readonly string $functionName,
        public readonly array $parameters = [],
        array $children = []
    )
    {
        parent::__construct('FUNCTION_DECLARATION', $children);
    }

    public function __toString(): string
    {
        return parent::__toString() . " ({$this->functionName})";
    }
}
