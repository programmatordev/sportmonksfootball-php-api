<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use function DeepCopy\deep_copy;

trait CacheTrait
{
    public function withCacheTtl(?int $ttl): static
    {
        $clone = deep_copy($this, true);
        $clone->api->getCacheBuilder()?->setTtl($ttl);

        return $clone;
    }
}