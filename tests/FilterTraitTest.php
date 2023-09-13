<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class FilterTraitTest extends AbstractTest
{
    public function testFilterTraitWithIncludes()
    {
        $this->assertSame(
            ['filter-1' => 100, 'filter-2' => 'value'],
            $this->givenApi()->countries()->withFilters(['filter-1' => 100, 'filter-2' => 'value'])->getFilters()
        );
    }

    #[DataProvider('provideInvalidFiltersData')]
    public function testFilterTraitWithFiltersWithInvalidValue(array $filters)
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->countries()->withFilters($filters);
    }

    public static function provideInvalidFiltersData(): \Generator
    {
        yield 'blank value' => [['filter' => '']];
        yield 'blank key' => [['' => 100]];
        yield 'invalid type value' => [['filter' => false]];
        yield 'invalid type key' => [[100 => 'value']];
    }
}