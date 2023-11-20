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
        string $assertCallback = 'assertResponse'
    ): void
    {
        $this->mockHttpClient->addResponse(new Response(
            body: MockResponse::buildCollectionResponse($mockData)
        ));

        $response = $this->givenApi()->$endpointName()->$methodName(...$methodParams);
        $this->$assertCallback($response->getData()[0]);
    }

    public abstract static function provideEndpointCollectionResponseData(): \Generator;
}