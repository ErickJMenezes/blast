<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Statement;

class ElseStatement extends Statement
{
    public function __construct(array $children = [])
    {
        parent::__construct('IF_STATEMENT', $children);
    }
}
