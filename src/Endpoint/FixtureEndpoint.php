<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class FixtureEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;
    use IncludeTrait;
    use FilterTrait;
    use ValidatorTrait;

    protected int $cacheTtl = 3600; // 1 hour

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAll(
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): FixtureCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/fixtures',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new FixtureCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): FixtureItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/fixtures/{id}', [
                'id' => $id
            ])
        );

        return new FixtureItem($response);
    }

    /**
     * @param int[] $ids
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByMultipleIds(array $ids): FixtureCollection
    {
        // TODO validate array $ids

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/fixtures/multi/{ids}', [
                'ids' => implode(',', $ids)
            ])
        );

        return new FixtureCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByDate(\DateTimeInterface $date): FixtureCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/fixtures/date/{date}', [
                'date' => $date->format('Y-m-d')
            ])
        );

        return new FixtureCollection($response);
    }
}