<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;

trait TestEndpointCollectionResponseTrait
{
    #[DataProvider('provideEndpointCollectionResponseData')]
    public function testEndpointCollectionResponse(
        string $mockData,
        string $endpointName,
        string $methodName,
        array $methodParams,
        string $entityClass,
        string $assertion
    ): void
    {
        $this->mockHttpClient->addResponse(new Response(
            body: MockResponse::buildCollectionResponse($mockData)
        ));

        $response = $this->givenApi()->$endpointName()->$methodName(...$methodParams);

        $data = $response->getData();
        $this->assertContainsOnlyInstancesOf($entityClass, $data);
        $this->$assertion($data[0]);
    }

    public abstract static function provideEndpointCollectionResponseData(): \Generator;
}