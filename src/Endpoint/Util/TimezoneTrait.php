<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

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