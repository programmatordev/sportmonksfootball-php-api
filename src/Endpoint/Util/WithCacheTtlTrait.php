<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

trait WithCacheTtlTrait
{
    public function withCacheTtl(int $seconds): static
    {
        $clone = clone $this;
        $clone->cacheTtl = $seconds;

        return $clone;
    }

    public function getCacheTtl(): int
    {
        return $this->cacheTtl;
    }
}