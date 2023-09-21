<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;

trait TestEndpointItemResponseTrait
{
    #[DataProvider('provideEndpointItemResponseData')]
    public function testEndpointItemResponse(
        string $mockData,
        string $endpointName,
        string $methodName,
        array $methodParams,
        string $entityClass,
        string $assertion
    ): void
    {
        $this->mockHttpClient->addResponse(new Response(
            body: MockResponse::buildItemResponse($mockData)
        ));

        $response = $this->givenApi()->$endpointName()->$methodName(...$methodParams);

        $data = $response->getData();
        $this->assertInstanceOf($entityClass, $data);
        $this->$assertion($data);
    }

    public abstract static function provideEndpointItemResponseData(): \Generator;
}