<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class PaginationTraitTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            use PaginationTrait;

            public function getPage(): ?int
            {
                return $this->api->getQueryDefault('page');
            }

            public function getPerPage(): ?int
            {
                return $this->api->getQueryDefault('per_page');
            }

            public function getSortBy(): ?string
            {
                return $this->api->getQueryDefault('sortBy');
            }

            public function getOrder(): ?string
            {
                return $this->api->getQueryDefault('order');
            }
        };
    }

    public function testMethods(): void
    {
        $this->assertSame(1, $this->resource->withPage(1)->getPage());
        $this->assertSame(null, $this->resource->getPage());

        $this->assertSame(25, $this->resource->withPerPage(25)->getPerPage());
        $this->assertSame(null, $this->resource->getPerPage());

        $this->assertSame('name', $this->resource->withSortBy('name')->getSortBy());
        $this->assertSame(null, $this->resource->getSortBy());

        $this->assertSame('asc', $this->resource->withOrder('asc')->getOrder());
        $this->assertSame(null, $this->resource->getOrder());

        $this->assertSame(1, $this->resource->withPagination(page: 1)->getPage());
        $this->assertSame(25, $this->resource->withPagination(page: 1, perPage: 25)->getPerPage());
        $this->assertSame('name', $this->resource->withPagination(page: 1, sortBy: 'name')->getSortBy());
        $this->assertSame('asc', $this->resource->withPagination(page: 1, order: 'asc')->getOrder());
    }
}