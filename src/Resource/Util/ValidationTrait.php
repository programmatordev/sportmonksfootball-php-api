<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use ProgrammatorDev\Validator\Exception\ValidationException;
use ProgrammatorDev\Validator\Validator;

trait ValidationTrait
{
    /**
     * @throws ValidationException
     */
    protected function validateQuery(string $query, string $name): void
    {
        Validator::notBlank()->assert($query, $name);
    }

    /**
     * @throws ValidationException
     */
    protected function validateTimezone(string $timezone): void
    {
        Validator::timezone()->assert($timezone, 'timezone');
    }
}