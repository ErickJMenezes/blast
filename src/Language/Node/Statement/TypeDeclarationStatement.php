<?php

namespace Blast\Language\Node\Statement;

use Blast\Language\Node\Statement;

class TypeDeclarationStatement extends Statement
{
    public function __construct(
        public readonly string $typeName,
        array $children = []
    )
    {
        parent::__construct('TYPE_DECLARATION', $children);
    }

    public function __toString(): string
    {
        return parent::__toString() . " ($this->typeName)";
    }
}
