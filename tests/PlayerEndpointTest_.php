<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Player;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class PlayerEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::PLAYER_ITEM_DATA,
            'players',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAll',
            []
        ];
        yield 'get all by country id' => [
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by search query' => [
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAllBySearchQuery',
            ['test']
        ];
        yield 'get all last updated' => [
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAllLastUpdated',
            []
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['players', 'getAll', []];
        yield 'get all by country id' => ['players', 'getAllByCountryId', [1]];
        yield 'get all by search query' => ['players', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['players', 'getAllBySearchQuery'];
    }

    private function assertResponse(Player $player): void
    {
        $this->assertSame(14, $player->getId());
        $this->assertSame(1, $player->getSportId());
        $this->assertSame(320, $player->getCountryId());
        $this->assertSame(320, $player->getNationalityId());
        $this->assertSame(null, $player->getCityId());
        $this->assertSame(25, $player->getPositionId());
        $this->assertSame(null, $player->getDetailedPositionId());
        $this->assertSame(25, $player->getTypeId());
        $this->assertSame('D. Agger', $player->getCommonName());
        $this->assertSame('Daniel Munthe', $player->getFirstName());
        $this->assertSame('Agger', $player->getLastName());
        $this->assertSame('Daniel Munthe Agger', $player->getName());
        $this->assertSame('Daniel Agger', $player->getDisplayName());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/players/14/14.png', $player->getImagePath());
        $this->assertSame(191, $player->getHeight());
        $this->assertSame(84, $player->getWeight());
        $this->assertSame('1984-12-12 00:00:00', $player->getDateOfBirth()->format('Y-m-d H:i:s'));
        $this->assertSame('male', $player->getGender());
    }
}