<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class LanguageTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function getLanguage(): string
            {
                return $this->api->getQueryDefault('locale');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('pt', $this->resource->withLanguage('pt')->getLanguage());
        $this->assertSame('en', $this->resource->getLanguage()); // back to default value
    }
}