<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use function DeepCopy\deep_copy;

trait TimezoneTrait
{
    public function withTimezone(string $timezone): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('timezone', $timezone);

        return $clone;
    }
}