<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait SelectTrait
{
    protected array $select = [];

    /**
     * @param string[] $select
     * @throws ValidationException
     */
    public function withSelect(array $select): static
    {
        Validator::eachValue(Validator::notBlank()->type('string'))->assert($select, 'select');

        $clone = clone $this;
        $clone->select = $select;

        return $clone;
    }

    /**
     * @return string[]
     */
    public function getSelect(): array
    {
        return $this->select;
    }
}