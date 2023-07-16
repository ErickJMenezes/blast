<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class StringNode extends Expression
{
    public function __construct(public readonly string $value)
    {
        parent::__construct('T_STRING');
    }

    public function __toString(): string
    {
        $length = strlen($this->value);
        return "{$this->name} ({$length})";
    }
}
