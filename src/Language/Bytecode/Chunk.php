<?php

namespace Blast\Language\Bytecode;

readonly class Chunk
{
    public function __construct(
        public int $count,
        public int $capacity,
        public array $code,
    ) {}
}
