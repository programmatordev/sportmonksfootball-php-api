<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CommentaryCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class CommentaryResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): CommentaryCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/commentaries'
        );

        return new CommentaryCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureId(int $fixtureId): CommentaryCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/commentaries/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ])
        );

        return new CommentaryCollection($data);
    }
}