<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use ProgrammatorDev\Validator\Exception\ValidationException;
use ProgrammatorDev\Validator\Validator;

trait ValidationTrait
{
    /**
     * @throws ValidationException
     */
    protected function validateQuery(string $query, string $name = 'query'): void
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

    /**
     * @throws ValidationException
     */
    protected function validateDateOrder(\DateTimeInterface $startDate, \DateTimeInterface $endDate): void
    {
        Validator::greaterThan(
            constraint: $startDate,
            message: 'The endDate must be after the startDate.'
        )->assert($endDate);
    }

    /**
     * @throws ValidationException
     */
    protected function validateMultipleIntegers(array $data, string $name): void
    {
        Validator::eachValue(
            Validator::type('int')
        )->assert($data, $name);
    }
}