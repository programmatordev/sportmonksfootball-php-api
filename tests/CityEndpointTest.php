<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use ProgrammatorDev\SportMonksFootball\Entity\City;
use ProgrammatorDev\SportMonksFootball\Test\DataProvider\InvalidValueDataProvider;

class CityEndpointTest extends AbstractTest
{
    public function testCityEndpointGetAll()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CITY_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->cities()->getAll();

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(City::class, $data);
        $this->assertCityResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testCityGetAllWithInvalidPagination(int $page, int $perPage, string $order, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->regions()->getAll($page, $perPage, $order);
    }

    public function testCityEndpointGetById()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CITY_ITEM_RESPONSE
            )
        );

        $response = $this->givenApi()->cities()->getById(1);

        $data = $response->getData();
        $this->assertCityResponse($data);
    }

    public function testCityEndpointGetBySearchQuery()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::CITY_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->cities()->getBySearchQuery('test');

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(City::class, $data);
        $this->assertCityResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidQueryData')]
    public function testCityGetBySearchQueryWithInvalidQuery(string $query, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->cities()->getBySearchQuery($query);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testCityGetBySearchQueryWithInvalidPagination(int $page, int $perPage, string $order, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->cities()->getBySearchQuery('test', $page, $perPage, $order);
    }

    private function assertCityResponse(City $city): void
    {
        $this->assertSame(1, $city->getId());
        $this->assertSame(107, $city->getCountryId());
        $this->assertSame(1, $city->getRegionId());
        $this->assertSame("'Afak", $city->getName());
        $this->assertSame(24.84926, $city->getLatitude());
        $this->assertSame(46.84591, $city->getLongitude());
    }
}