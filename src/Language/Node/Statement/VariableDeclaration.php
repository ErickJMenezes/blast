<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;

class VariableDeclaration extends Statement
{
    public function __construct(
        public readonly string $variable,
        public readonly ?Expression $defaultValue = null,
    )
    {
        parent::__construct('VARIABLE_DECLARATION', $this->defaultValue ? [$this->defaultValue] : []);
    }

    public function __toString(): string
    {
        return parent::__toString() . " ({$this->variable})";
    }
}
