<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RivalCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class RivalResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): RivalCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/rivals'
        );

        return new RivalCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): RivalCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/rivals/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new RivalCollection($data);
    }
}