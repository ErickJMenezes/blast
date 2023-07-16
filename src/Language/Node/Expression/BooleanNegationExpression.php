<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class BooleanNegationExpression extends Expression
{
    public function __construct(array $children = [])
    {
        parent::__construct('BOOLEAN_NEGATION_EXPRESSION', $children);
    }
}
