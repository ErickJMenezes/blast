<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;

class ForStatement extends Statement
{
    public function __construct(
        public readonly null|Expression|VariableDeclaration $init = null,
        public readonly null|Expression $condition = null,
        public readonly null|Expression $update = null,
        array $children = [],
    )
    {
        parent::__construct('FOR_STATEMENT', $children);
    }
}
