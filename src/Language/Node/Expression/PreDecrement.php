<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class PreDecrement extends Expression
{
    public function __construct(array $children = [])
    {
        parent::__construct('POST_DECREMENT', $children);
    }
}
