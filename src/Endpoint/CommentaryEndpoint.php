<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\ValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CommentaryCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class CommentaryEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;
    use IncludeTrait;
    use FilterTrait;
    use ValidatorTrait;

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAll(
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): CommentaryCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/commentaries',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new CommentaryCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByFixtureId(int $fixtureId): CommentaryCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/commentaries/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ])
        );

        return new CommentaryCollection($response);
    }
}