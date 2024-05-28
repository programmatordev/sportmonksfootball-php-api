<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TopscorerCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class TopscorerResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): TopscorerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/topscorers/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new TopscorerCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByStageId(int $stageId): TopscorerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/topscorers/stages/{stageId}', [
                'stageId' => $stageId
            ])
        );

        return new TopscorerCollection($data);
    }
}