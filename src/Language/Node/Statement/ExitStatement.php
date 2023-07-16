<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;

class ExitStatement extends Statement
{
    public function __construct(
        public readonly ?Expression $defaultValue = null,
    )
    {
        parent::__construct(
            'EXIT_STATEMENT',
            $this->defaultValue ? [$this->defaultValue] : []
        );
    }
}
