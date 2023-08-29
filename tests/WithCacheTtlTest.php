<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class WithCacheTtlTest extends AbstractTest
{
    public function testWithCacheTtl()
    {
        $this->assertSame(
            60,
            $this->givenApi()->continents->withCacheTtl(60)->getCacheTtl()
        );
    }
}