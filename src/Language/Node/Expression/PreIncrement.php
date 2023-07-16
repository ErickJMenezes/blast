<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class PreIncrement extends Expression
{
    public function __construct(array $children = [])
    {
        parent::__construct('PRE_INCREMENT', $children);
    }
}
