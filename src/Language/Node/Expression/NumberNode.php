<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class NumberNode extends Expression
{
    public function __construct(public readonly string $value)
    {
        parent::__construct('T_NUMBER');
    }

    public function __toString(): string
    {
        return "{$this->name} ({$this->value})";
    }
}
