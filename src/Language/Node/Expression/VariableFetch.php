<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class VariableFetch extends Expression
{
    public function __construct(public readonly string $value)
    {
        parent::__construct('VARIABLE_FETCH');
    }

    public function __toString(): string
    {
        return parent::__toString() . " ({$this->value})";
    }
}
