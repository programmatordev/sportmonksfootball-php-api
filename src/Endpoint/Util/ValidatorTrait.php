<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait ValidatorTrait
{
    /**
     * @throws ValidationException
     */
    private function validateSearchQuery(string $query): void
    {
        Validator::notBlank()->assert($query, 'query');
    }

    /**
     * @throws ValidationException
     */
    private function validatePagination(int $page, int $perPage, string $order): void
    {
        Validator::greaterThanOrEqual(1)->assert($page, 'page');
        Validator::greaterThanOrEqual(1)->assert($perPage, 'perPage');
        Validator::choice([Pagination::ORDER_ASC, Pagination::ORDER_DESC])->assert($order, 'order');
    }
}