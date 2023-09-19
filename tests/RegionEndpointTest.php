<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use ProgrammatorDev\SportMonksFootball\Entity\Region;
use ProgrammatorDev\SportMonksFootball\Test\DataProvider\InvalidValueDataProvider;

class RegionEndpointTest extends AbstractTest
{
    public function testRegionEndpointGetAll()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::REGION_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->regions()->getAll();

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(Region::class, $data);
        $this->assertRegionResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testRegionGetAllWithInvalidPagination(int $page, int $perPage, string $order, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->regions()->getAll($page, $perPage, $order);
    }

    public function testRegionEndpointGetById()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::REGION_ITEM_RESPONSE
            )
        );

        $response = $this->givenApi()->regions()->getById(1);

        $data = $response->getData();
        $this->assertRegionResponse($data);
    }

    public function testRegionEndpointGetBySearchQuery()
    {
        $this->mockHttpClient->addResponse(
            new Response(
                body: MockResponse::REGION_COLLECTION_RESPONSE
            )
        );

        $response = $this->givenApi()->regions()->getBySearchQuery('test');

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf(Region::class, $data);
        $this->assertRegionResponse($data[0]);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidQueryData')]
    public function testRegionGetBySearchQueryWithInvalidQuery(string $query, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->regions()->getBySearchQuery($query);
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidPaginationData')]
    public function testRegionGetBySearchQueryWithInvalidPagination(int $page, int $perPage, string $order, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->regions()->getBySearchQuery('test', $page, $perPage, $order);
    }

    private function assertRegionResponse(Region $region): void
    {
        $this->assertSame(1, $region->getId());
        $this->assertSame(107, $region->getCountryId());
        $this->assertSame('Al Qadisiyah', $region->getName());
    }
}