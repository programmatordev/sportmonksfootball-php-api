<?php

namespace ProgrammatorDev\SportMonksFootball\Language;

use ProgrammatorDev\SportMonksFootball\Util\ClassConstantsTrait;

class Language
{
    use ClassConstantsTrait;

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