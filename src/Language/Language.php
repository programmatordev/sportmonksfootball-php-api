<?php

namespace ProgrammatorDev\SportMonksFootball\Language;

use ProgrammatorDev\SportMonksFootball\Util\GetClassConstantsTrait;

class Language
{
    use GetClassConstantsTrait;

    public const ARABIC = 'ar';
    public const CHINESE = 'zh';
    public const ENGLISH = 'en';
    public const GREEK = 'el';
    public const JAPANESE = 'ja';
    public const PERSIAN = 'fa';
    public const RUSSIAN = 'ru';

    public static function getOptions(): array
    {
        return (new Language)->getClassConstants(self::class);
    }
}