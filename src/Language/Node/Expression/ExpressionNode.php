<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class ExpressionNode extends Expression
{
    public function __construct(array $children = [])
    {
        parent::__construct('EXPRESSION', $children);
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
