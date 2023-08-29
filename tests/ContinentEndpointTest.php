<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use ProgrammatorDev\SportMonksFootball\Entity\Continent;

class ContinentEndpointTest extends AbstractTest
{
    public function testContinentGetAllContinents()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CONTINENT_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->continents->getAllContinents();

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(Continent::class, $data);
        $this->assertContinentResponse($data[0]);
    }

    public function testContinentGetContinentById()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CONTINENT_ITEM_RESPONSE
            )
        );

        $response = $this->givenApi()->continents->getContinentById(1);

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