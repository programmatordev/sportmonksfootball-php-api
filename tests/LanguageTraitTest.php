<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use ProgrammatorDev\SportMonksFootball\Test\DataProvider\InvalidValueDataProvider;

class LanguageTraitTest extends AbstractTest
{
    public function testLanguageTraitWithLanguage()
    {
        $this->assertSame(
            'ja',
            $this->givenApi()->continents()->withLanguage('ja')->getLanguage()
        );
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidLanguageData')]
    public function testLanguageTraitWithLanguageWithInvalidValue(string $language, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->givenApi()->continents()->withLanguage($language);
    }
}