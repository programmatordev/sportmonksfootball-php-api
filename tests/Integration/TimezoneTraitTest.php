<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\Validator\Exception\ValidationException;

class TimezoneTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function getTimezone(): string
            {
                return $this->api->getQueryDefault('timezone');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame('Europe/Lisbon', $this->resource->withTimezone('Europe/Lisbon')->getTimezone());
        $this->assertSame('UTC', $this->resource->getTimezone()); // back to default value
    }

    public function testValidationException(): void
    {
        $this->expectException(ValidationException::class);
        $this->resource->withTimezone('invalid');
    }
}