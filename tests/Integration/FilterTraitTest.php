<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FilterTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function getFilter(): ?string
            {
                return $this->api->getQueryDefault('filters');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('eventTypes:18,17', $this->resource->withFilter('eventTypes:18,17')->getFilter());
        $this->assertSame(null, $this->resource->getFilter()); // back to default value
    }
}