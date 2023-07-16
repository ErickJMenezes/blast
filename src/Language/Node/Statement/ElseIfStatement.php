<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;

class ElseIfStatement extends Statement
{
    public function __construct(
        public readonly Expression $condition,
        array $children = [],
    )
    {
        parent::__construct('IF_STATEMENT', $children);
    }
}
