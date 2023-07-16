<?php

namespace Blast\Language\Node\Expression;

use Blast\Language\Node\Expression;

class PropertyFetch extends Expression
{
    public function __construct(
        public readonly Expression $object,
        public readonly Expression $property
    )
    {
        parent::__construct('PROPERTY_FETCH', [
            $this->object,
            $this->property,
        ]);
    }
}
