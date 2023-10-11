<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class StatisticEndpoint extends AbstractEndpoint
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
    public function getAllByPlayerId(
        int $playerId,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): PlayerStatisticCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/statistics/seasons/players/{playerId}', [
                'playerId' => $playerId
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new PlayerStatisticCollection($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAllByTeamId(
        int $teamId,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): TeamStatisticCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/statistics/seasons/teams/{teamId}', [
                'teamId' => $teamId
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new TeamStatisticCollection($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAllByCoachId(
        int $coachId,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): CoachStatisticCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/statistics/seasons/coaches/{coachId}', [
                'coachId' => $coachId
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new CoachStatisticCollection($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAllByRefereeId(
        int $refereeId,
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): RefereeStatisticCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/statistics/seasons/referees/{refereeId}', [
                'refereeId' => $refereeId
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new RefereeStatisticCollection($response);
    }
}