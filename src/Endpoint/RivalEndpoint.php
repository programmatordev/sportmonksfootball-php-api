<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RivalCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class RivalEndpoint extends AbstractEndpoint
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
    ): RivalCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/rivals',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new RivalCollection($response);
    }


    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByTeamId(int $teamId): RivalCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/rivals/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new RivalCollection($response);
    }
}