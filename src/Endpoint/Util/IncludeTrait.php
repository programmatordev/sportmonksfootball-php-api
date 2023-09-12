<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait IncludeTrait
{
    protected array $includes = [];

    /**
     * @param string[] $includes
     * @throws ValidationException
     */
    public function withIncludes(array $includes): static
    {
        Validator::eachValue(Validator::notBlank()->type('string'))->assert($includes, 'includes');

        $clone = clone $this;
        $clone->includes = $includes;

        return $clone;
    }

    /**
     * @return string[]
     */
    public function getIncludes(): array
    {
        return $this->includes;
    }
}