<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

trait IncludeTrait
{
    protected array $includes = [];

    public function withIncludes(array $includes): static
    {
        $clone = clone $this;
        $clone->includes = $includes;

        return $clone;
    }

    public function getIncludes(): array
    {
        return $this->includes;
    }
}