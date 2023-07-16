<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class PostPower extends Expression
{
    public function __construct(array $children = [])
    {
        parent::__construct('POST_POWER', $children);
    }
}
