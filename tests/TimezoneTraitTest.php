<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class TimezoneTraitTest extends AbstractTest
{
    public function testSelectTraitWithTimezone()
    {
        $this->assertSame(
            'Europe/Lisbon',
            $this->givenApi()->continents()->withTimezone('Europe/Lisbon')->getTimezone()
        );
    }

    #[DataProvider('provideInvalidTimezoneData')]
    public function testSelectTraitWithSelectWithInvalidValue(string $timezone)
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->continents()->withTimezone($timezone);
    }

    public static function provideInvalidTimezoneData(): \Generator
    {
        yield 'blank value' => [''];
        yield 'invalid timezone' => ['Invalid/Timezone'];
    }
}