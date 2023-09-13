<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait PaginationValidatorTrait
{
    /**
     * @throws ValidationException
     */
    private function validatePagination(int $page, int $perPage): void
    {
        Validator::greaterThanOrEqual(1)->assert($page, 'page');
        Validator::greaterThanOrEqual(1)->assert($perPage, 'perPage');
    }
}