<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;

class IfStatement extends Statement
{
    /**
     * @param \Blast\Language\Node\Expression                       $condition
     * @param array<\Blast\Language\Node>                           $children
     * @param array<\Blast\Language\Node\Statement\ElseIfStatement> $elseIfs
     * @param \Blast\Language\Node\Statement\ElseStatement|null     $else
     */
    public function __construct(
        public readonly Expression $condition,
        array $children = [],
        public readonly array $elseIfs = [],
        public readonly ?ElseStatement $else = null,
    )
    {
        parent::__construct('IF_STATEMENT', $children);
    }
}
