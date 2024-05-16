<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Resource\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SelectTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function getSelect(): ?string
            {
                return $this->api->getQueryDefault('select');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('id,name', $this->resource->withSelect('id,name')->getSelect());
        $this->assertSame(null, $this->resource->getSelect()); // back to default value
    }
}