<?php

namespace ProgrammatorDev\SportMonksFootball\Language;

use ProgrammatorDev\SportMonksFootball\Helper\ReflectionHelper;

class Language
{
    public const ARABIC = 'ar';
    public const CHINESE = 'zh';
    public const ENGLISH = 'en';
    public const GREEK = 'el';
    public const ITALIAN = 'it';
    public const JAPANESE = 'ja';
    public const PERSIAN = 'fa';
    public const RUSSIAN = 'ru';

    public static function getOptions(): array
    {
        return ReflectionHelper::getClassConstants(self::class);
    }
}