<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class AssignmentExpression extends Expression
{
    public function __construct(
        public readonly Expression $target,
        public readonly Expression $value,
    )
    {
        parent::__construct('ASSIGNMENT_EXPRESSION');
    }
}
