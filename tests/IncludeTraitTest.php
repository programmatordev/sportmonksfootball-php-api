<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class IncludeTraitTest extends AbstractTest
{
    public function testIncludeTraitWithInclude()
    {
        $this->assertSame(
            ['countries'],
            $this->givenApi()->continents()->withInclude(['countries'])->getInclude()
        );
    }

    #[DataProvider('provideInvalidIncludeData')]
    public function testIncludeTraitWithIncludeWithInvalidValue(array $include)
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->continents()->withInclude($include);
    }

    public static function provideInvalidIncludeData(): \Generator
    {
        yield 'blank value' => [['countries', '']];
        yield 'invalid type value' => [['countries', 123]];
    }
}