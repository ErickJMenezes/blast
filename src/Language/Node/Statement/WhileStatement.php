<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;

class WhileStatement extends Statement
{
    public function __construct(
        public readonly null|Expression $condition = null,
        array $children = [],
    )
    {
        parent::__construct('FOR_STATEMENT', $children);
    }
}
