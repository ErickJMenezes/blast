<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Statement;

class ImportStatement extends Statement
{
    public function __construct(
        public readonly string $identifier,
    )
    {
        parent::__construct('IMPORT_STATEMENT');
    }
}
