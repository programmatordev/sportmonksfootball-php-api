<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\VenueCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\VenueItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class VenueEndpoint extends AbstractEndpoint
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
    ): VenueCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/venues',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new VenueCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): VenueItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/venues/{id}', [
                'id' => $id
            ])
        );

        return new VenueItem($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllBySeasonId(int $seasonId): VenueCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/venues/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new VenueCollection($response);
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
    ): VenueCollection
    {
        $this->validateSearchQuery($query);
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/venues/search/{query}', [
                'query' => $query
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new VenueCollection($response);
    }
}