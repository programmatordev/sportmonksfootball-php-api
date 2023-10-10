<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Odd;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;

class PreMatchOddEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAll',
            [],
            Odd::class,
            'assertResponse'
        ];
        yield 'get all by fixture id' => [
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllByFixtureId',
            [1],
            Odd::class,
            'assertResponse'
        ];
        yield 'get all by fixture id and bookmaker id' => [
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllByFixtureIdAndBookmakerId',
            [1, 1],
            Odd::class,
            'assertResponse'
        ];
        yield 'get all by fixture id and market id' => [
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllByFixtureIdAndMarketId',
            [1, 1],
            Odd::class,
            'assertResponse'
        ];
        yield 'get all last updated' => [
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllLastUpdated',
            [],
            Odd::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['players', 'getAll', []];
    }

    private function assertResponse(Odd $odd): void
    {
        $this->assertSame(1, $odd->getId());
        $this->assertSame(18533878, $odd->getFixtureId());
        $this->assertSame(1, $odd->getMarketId());
        $this->assertSame(34, $odd->getBookmakerId());
        $this->assertSame('Home', $odd->getLabel());
        $this->assertSame('1.48', $odd->getValue());
        $this->assertSame('Home', $odd->getName());
        $this->assertSame(null, $odd->getOrder());
        $this->assertSame('Match Winner', $odd->getMarketDescription());
        $this->assertSame('67.57%', $odd->getProbability());
        $this->assertSame('1.480', $odd->getDp3());
        $this->assertSame('37/25', $odd->getFractional());
        $this->assertSame('-209', $odd->getAmerican());
        $this->assertSame(false, $odd->isWinning());
        $this->assertSame(false, $odd->hasStopped());
        $this->assertSame(null, $odd->getTotal());
        $this->assertSame(null, $odd->getHandicap());
        $this->assertSame(null, $odd->getParticipants());
        $this->assertSame('2023-01-11 14:40:25', $odd->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2023-01-11 14:47:50', $odd->getUpdatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame(null, $odd->getOriginalLabel());
        $this->assertSame('2023-01-11 14:40:25', $odd->getLatestBookmakerUpdatedAt()->format('Y-m-d H:i:s'));
    }
}