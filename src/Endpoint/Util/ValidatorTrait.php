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
    private function validateDateRange(
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        bool $allowFutureDates = false,
        ?int $maxDays = null
    ): void
    {
        if ($startDate instanceof \DateTime) {
            $startDate = \DateTimeImmutable::createFromMutable($startDate);
        }

        if ($endDate instanceof \DateTime) {
            $endDate = \DateTimeImmutable::createFromMutable($endDate);
        }

        $todayDate = new \DateTimeImmutable('today');
        // Reset time in dates
        $startDate = $startDate->setTime(0, 0);
        $endDate = $endDate->setTime(0, 0);

        // Start date must be less or equal to end date
        Validator::lessThanOrEqual(
            constraint: $endDate,
            message: 'The startDate value should be less than or equal to the endDate.'
        )->assert($startDate);

        if (!$allowFutureDates) {
            // End date must be less or equal to today date
            Validator::lessThanOrEqual(
                constraint: $todayDate,
                message: \sprintf(
                    'The endDate value should be less than or equal to %s, %s given.',
                    $todayDate->format('Y-m-d'),
                    $endDate->format('Y-m-d')
                )
            )->assert($endDate);
        }

        if ($maxDays) {
            // https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-between-date-range
            $dateInterval = $startDate->diff($endDate);

            Validator::lessThanOrEqual(
                constraint: $maxDays,
                message: 'The date range between startDate and endDate must be less than or equal to {{ constraint }} days, {{ value }} given.'
            )->assert($dateInterval->days);
        }

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

    /**
     * @throws ValidationException
     */
    public function validateMultipleIds(array $ids): void
    {
        Validator::eachValue(Validator::type('int'))->assert($ids, 'ids');
    }
}