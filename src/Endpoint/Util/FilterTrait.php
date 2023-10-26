<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait FilterTrait
{
    protected array $filters = [];

    /**
     * @param array<string, string|int> $filters
     * @throws ValidationException
     */
    public function withFilters(array $filters): static
    {
        Validator::eachKey(Validator::notBlank()->type('string'))
            ->eachValue(Validator::notBlank()->type(['string', 'int']))
            ->assert($filters, 'filters');

        $clone = clone $this;
        $clone->filters = $filters;

        return $clone;
    }

    /**
     * @return array<string, string|int>
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}