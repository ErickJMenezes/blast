<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class FunctionCall extends Expression
{
    /**
     * @param \Blast\Language\Node\Expression $callee
     * @param array<Expression>               $args
     */
    public function __construct(
        public readonly Expression $variable,
        public readonly array $args = [],
    )
    {
        parent::__construct('FUNCTION_CALL');
    }
}
