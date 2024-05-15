<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;

trait TestItemResponseTrait
{
    #[DataProvider(methodName: 'provideItemResponseData')]
    public function testItemResponse(
        string $responseClass,
        string $responseBody,
        string $resource,
        string $method,
        array $args = []
    ): void
    {
        $this->mockClient->addResponse(new Response(
            status: 200,
            body: MockResponse::buildItemResponse($responseBody)
        ));

        $response = $this->api->$resource()->$method(...$args);
        $this->assertInstanceOf($responseClass, $response);
    }

    abstract public static function provideItemResponseData(): \Generator;
}