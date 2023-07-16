<?php

namespace Blast\Language;

use Mrsuh\Tree\NodeInterface;

abstract class Node implements NodeInterface
{
    public function __construct(
        public readonly string $name,
        public readonly array $children = [],
    ) {}

    public function getChildren(): array
    {
        return $this->children;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
