<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class BookmakerEndpoint extends AbstractEndpoint
{
    use SelectTrait;
    use FilterTrait;
    use ValidatorTrait;

    protected int $cacheTtl = 3600 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAll(
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): BookmakerCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/odds/bookmakers',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new BookmakerCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): BookmakerItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/odds/bookmakers/{id}', [
                'id' => $id
            ])
        );

        return new BookmakerItem($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAllByFixtureId(
        int $fixtureId,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): BookmakerCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/odds/bookmakers/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new BookmakerCollection($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAllBySearchQuery(
        string $query,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): BookmakerCollection
    {
        $this->validateSearchQuery($query);
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/odds/bookmakers/search/{query}', [
                'query' => $query
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new BookmakerCollection($response);
    }
}