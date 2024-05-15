<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;

trait TestCollectionResponseTrait
{
    #[DataProvider(methodName: 'provideCollectionResponseData')]
    public function testCollectionResponse(
        string $responseClass,
        string $responseBody,
        string $resource,
        string $method,
        array $args = []
    ): void
    {
        $this->mockClient->addResponse(new Response(
            status: 200,
            body: MockResponse::buildCollectionResponse($responseBody)
        ));

        $response = $this->api->$resource()->$method(...$args);
        $this->assertInstanceOf($responseClass, $response);
    }

    abstract public static function provideCollectionResponseData(): \Generator;
}