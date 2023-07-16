<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class FunctionExpression extends Expression
{
    public function __construct(
        public readonly array $parameters = [],
        array $children = []
    )
    {
        parent::__construct('ANONYMOUS_FUNCTION', $children);
    }
}
