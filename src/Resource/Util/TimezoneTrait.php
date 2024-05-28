<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use ProgrammatorDev\Validator\Exception\ValidationException;
use function DeepCopy\deep_copy;

trait TimezoneTrait
{
    use ValidationTrait;

    /**
     * @throws ValidationException
     */
    public function withTimezone(string $timezone): static
    {
        $this->validateTimezone($timezone);

        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('timezone', $timezone);

        return $clone;
    }
}