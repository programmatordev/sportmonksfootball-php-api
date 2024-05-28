<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use function DeepCopy\deep_copy;

trait SelectTrait
{
    public function withSelect(string $select): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('select', $select);

        return $clone;
    }
}