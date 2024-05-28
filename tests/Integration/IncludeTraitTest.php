<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class IncludeTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function getInclude(): ?string
            {
                return $this->api->getQueryDefault('include');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('fixtures;teams', $this->resource->withInclude('fixtures;teams')->getInclude());
        $this->assertSame(null, $this->resource->getInclude()); // back to default value
    }
}