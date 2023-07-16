<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class BooleanExpression extends Expression
{
    public function __construct(public readonly string $operator, array $children = [])
    {
        parent::__construct('BOOLEAN_EXPRESSION', $children);
    }

    public function __toString(): string
    {
        return parent::__toString() . " ($this->operator)";
    }
}
