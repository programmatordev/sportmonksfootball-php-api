<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

// TODO create tests for trait upon implementation of an endpoint that makes use of it
trait TimezoneTrait
{
    /**
     * @throws ValidationException
     */
    public function withTimezone(string $timezone): static
    {
        Validator::timezone()->assert($timezone, 'timezone');

        $clone = clone $this;
        $clone->timezone = $timezone;

        return $clone;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }
}