<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\Api\Builder\CacheBuilder;
use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use Psr\Cache\CacheItemPoolInterface;

class CacheTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $pool = $this->createMock(CacheItemPoolInterface::class);
        $cacheBuilder = new CacheBuilder($pool);

        $this->api->setCacheBuilder($cacheBuilder);

        $this->resource = new class($this->api) extends Resource {
            public function getCacheTtl(): ?int
            {
                return $this->api->getCacheBuilder()?->getTtl();
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame(600, $this->resource->withCacheTtl(600)->getCacheTtl());
        $this->assertSame(60, $this->resource->getCacheTtl()); // back to default value
    }
}