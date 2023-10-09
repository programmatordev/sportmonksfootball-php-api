<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\OddCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class PreMatchOddEndpoint extends AbstractEndpoint
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
    ): OddCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/odds/pre-match',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new OddCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByFixtureId(int $fixtureId): OddCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/odds/pre-match/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ])
        );

        return new OddCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByFixtureIdAndBookmakerId(int $fixtureId, int $bookmakerId): OddCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/odds/pre-match/fixtures/{fixtureId}/bookmakers/{bookmakerId}', [
                'fixtureId' => $fixtureId,
                'bookmakerId' => $bookmakerId
            ])
        );

        return new OddCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByFixtureIdAndMarketId(int $fixtureId, int $marketId): OddCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/odds/pre-match/fixtures/{fixtureId}/markets/{marketId}', [
                'fixtureId' => $fixtureId,
                'marketId' => $marketId
            ])
        );

        return new OddCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllLastUpdated(): OddCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/odds/pre-match/latest'
        );

        return new OddCollection($response);
    }
}