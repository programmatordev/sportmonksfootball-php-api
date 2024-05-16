<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use function DeepCopy\deep_copy;

trait IncludeTrait
{
    public function withInclude(string $include): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('include', $include);

        return $clone;
    }
}