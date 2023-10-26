<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait IncludeTrait
{
    protected array $include = [];

    /**
     * @param string[] $include
     * @throws ValidationException
     */
    public function withInclude(array $include): static
    {
        Validator::eachValue(Validator::notBlank()->type('string'))->assert($include, 'include');

        $clone = clone $this;
        $clone->include = $include;

        return $clone;
    }

    /**
     * @return string[]
     */
    public function getInclude(): array
    {
        return $this->include;
    }
}