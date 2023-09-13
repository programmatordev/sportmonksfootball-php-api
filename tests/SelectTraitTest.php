<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class SelectTraitTest extends AbstractTest
{
    public function testSelectTraitWithSelect()
    {
        $this->assertSame(
            ['id'],
            $this->givenApi()->continents()->withSelect(['id'])->getSelect()
        );
    }

    #[DataProvider('provideInvalidSelectData')]
    public function testSelectTraitWithSelectWithInvalidValue(array $select)
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->continents()->withSelect($select);
    }

    public static function provideInvalidSelectData(): \Generator
    {
        yield 'blank value' => [['id', '']];
        yield 'invalid type value' => [['id', 123]];
    }
}