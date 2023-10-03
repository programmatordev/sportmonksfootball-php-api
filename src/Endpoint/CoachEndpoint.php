<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class CoachEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;
    use IncludeTrait;
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
    ): CoachCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/coaches',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new CoachCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): CoachItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/coaches/{id}', [
                'id' => $id
            ])
        );

        return new CoachItem($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAllByCountryId(
        int $countryId,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): CoachCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/coaches/countries/{countryId}', [
                'countryId' => $countryId
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new CoachCollection($response);
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
    ): CoachCollection
    {
        $this->validateSearchQuery($query);
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/coaches/search/{query}', [
                'query' => $query
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new CoachCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllLastUpdated(): CoachCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/coaches/latest'
        );

        return new CoachCollection($response);
    }
}