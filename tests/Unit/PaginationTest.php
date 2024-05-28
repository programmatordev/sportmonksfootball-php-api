<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Pagination;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class PaginationTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Pagination([
            'count' => 25,
            'per_page' => 25,
            'current_page' => 1,
            'next_page' => 'https://api.sportmonks.com/v3/test?page=2',
            'has_more' => true
        ]);

        $this->assertSame(25, $entity->getCount());
        $this->assertSame(25, $entity->getPerPage());
        $this->assertSame(1, $entity->getCurrentPage());
        $this->assertSame('https://api.sportmonks.com/v3/test?page=2', $entity->getNextPage());
        $this->assertSame(true, $entity->hasMore());
    }
}