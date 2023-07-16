<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class NewObjectExpression extends Expression
{
    /**
     * @param string            $identifier
     * @param array<Expression> $arguments
     */
    public function __construct(
        public readonly string $identifier,
        public readonly array $arguments,
    )
    {
        parent::__construct('T_NEW');
    }
}
