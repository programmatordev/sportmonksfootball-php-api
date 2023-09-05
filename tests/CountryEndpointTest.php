<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use ProgrammatorDev\SportMonksFootball\Entity\Country;
use ProgrammatorDev\SportMonksFootball\Test\DataProvider\InvalidValueDataProvider;

class CountryEndpointTest extends AbstractTest
{
    public function testCountryEndpointGetAll()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::COUNTRY_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->countries()->getAll();

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(Country::class, $data);
        $this->assertCountryResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testContinentGetAllWithInvalidPagination(int $page, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->countries()->getAll($page);
    }

    public function testCountryEndpointGetById()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::COUNTRY_ITEM_RESPONSE
            )
        );

        $response = $this->givenApi()->countries()->getById(1);

        $data = $response->getData();
        $this->assertCountryResponse($data);
    }

    public function testCountryEndpointGetBySearchQuery()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::COUNTRY_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->countries()->getBySearchQuery('test');

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(Country::class, $data);
        $this->assertCountryResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidQueryData')]
    public function testContinentGetBySearchQueryWithInvalidQuery(string $query, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->countries()->getBySearchQuery($query);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testContinentGetBySearchQueryWithInvalidPagination(int $page, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->countries()->getBySearchQuery('test', $page);
    }

    private function assertCountryResponse(Country $country): void
    {
        $this->assertSame(2, $country->getId());
        $this->assertSame(1, $country->getContinentId());
        $this->assertSame('Poland', $country->getName());
        $this->assertSame('Republic of Poland', $country->getOfficialName());
        $this->assertSame('POL', $country->getFifaName());
        $this->assertSame('PL', $country->getIso2());
        $this->assertSame('POL', $country->getIso3());
        $this->assertSame(52.147850036621094, $country->getLatitude());
        $this->assertSame(19.37775993347168, $country->getLongitude());
        $this->assertSame(["BLR","CZE","DEU","LTU","RUS","SVK","UKR"], $country->getBorders());
        $this->assertSame('https://cdn.sportmonks.com/images/countries/png/short/pl.png', $country->getImagePath());
    }
}