<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Statement;

class StatementList extends Statement
{
    public function __construct(array $children = [])
    {
        parent::__construct('STATEMENT_LIST', $children);
    }
}
