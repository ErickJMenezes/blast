<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class BooleanNode extends Expression
{
    public function __construct(public readonly string $value)
    {
        parent::__construct($this->value === 'true' ? 'T_TRUE' : 'T_FALSE');
    }

    public function __toString(): string
    {
        return "{$this->name} ({$this->value})";
    }
}
