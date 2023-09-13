<?php

namespace ProgrammatorDev\SportMonksFootball\Test\DataProvider;

use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class InvalidValueDataProvider
{
    public static function provideInvalidTimezoneData(): \Generator
    {
        yield 'empty timezone' => ['', ValidationException::class];
        yield 'invalid timezone' => ['Invalid/Timezone', ValidationException::class];
    }

    public static function provideInvalidLanguageData(): \Generator
    {
        yield 'empty language' => ['', ValidationException::class];
        yield 'invalid language' => ['invalid', ValidationException::class];
    }

    public static function provideInvalidPaginationData(): \Generator
    {
        yield 'zero page' => [0, 25, ValidationException::class];
        yield 'zero per page' => [1, 0, ValidationException::class];
    }

    public static function provideInvalidQueryData(): \Generator
    {
        yield 'empty query' => ['', ValidationException::class];
    }
}