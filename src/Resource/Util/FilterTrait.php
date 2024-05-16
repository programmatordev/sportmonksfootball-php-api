<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use function DeepCopy\deep_copy;

trait FilterTrait
{
    public function withFilter(string $filter): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('filters', $filter);

        return $clone;
    }
}