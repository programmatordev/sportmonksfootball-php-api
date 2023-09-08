<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class IncludeTraitTest extends AbstractTest
{
    public function testIncludeTraitWithIncludes()
    {
        $this->assertSame(
            ['countries'],
            $this->givenApi()->continents()->withIncludes(['countries'])->getIncludes()
        );
    }

    #[DataProvider('provideInvalidIncludesData')]
    public function testIncludeTraitWithIncludesWithInvalidValue(array $includes)
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->continents()->withIncludes($includes);
    }

    public static function provideInvalidIncludesData(): \Generator
    {
        yield 'blank value' => [['countries', '']];
        yield 'invalid type' => [['countries', 123]];
    }
}