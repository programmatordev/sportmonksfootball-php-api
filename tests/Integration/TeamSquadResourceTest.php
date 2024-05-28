<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamSquadCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class TeamSquadResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all by team id' => [
            TeamSquadCollection::class,
            MockResponse::TEAM_SQUAD_COLLECTION_DATA,
            'teamSquads',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all extended by team id' => [
            PlayerCollection::class,
            MockResponse::PLAYER_COLLECTION_DATA,
            'teamSquads',
            'getAllExtendedByTeamId',
            [1]
        ];
        yield 'get all by season id and team id' => [
            TeamSquadCollection::class,
            MockResponse::TEAM_SQUAD_COLLECTION_DATA,
            'teamSquads',
            'getAllBySeasonIdAndTeamId',
            [1, 1]
        ];
    }
}