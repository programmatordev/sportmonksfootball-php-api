<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class CacheTtlTraitTest extends AbstractTest
{
    public function testCacheTtlTraitWithCacheTtl()
    {
        $this->assertSame(
            60,
            $this->givenApi()->continents()->withCacheTtl(60)->getCacheTtl()
        );
    }
}