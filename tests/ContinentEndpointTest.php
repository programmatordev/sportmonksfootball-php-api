<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Test\DataProvider\InvalidValueDataProvider;

class ContinentEndpointTest extends AbstractTest
{
    public function testContinentEndpointGetAll()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CONTINENT_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->continents()->getAll();

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(Continent::class, $data);
        $this->assertContinentResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testContinentGetAllWithInvalidPagination(int $page, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->continents()->getAll($page);
    }

    public function testContinentEndpointGetById()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CONTINENT_ITEM_RESPONSE
            )
        );

        $response = $this->givenApi()->continents()->getById(1);

        $data = $response->getData();
        $this->assertContinentResponse($data);
    }

    private function assertContinentResponse(Continent $continent): void
    {
        $this->assertInstanceOf(Continent::class, $continent);
        $this->assertSame(1, $continent->getId());
        $this->assertSame('Europe', $continent->getName());
        $this->assertSame('EU', $continent->getCode());
    }
}