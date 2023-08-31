<?php

namespace ProgrammatorDev\SportMonksFootball\Language;

class Language
{
    public const ARABIC = 'ar';
    public const CHINESE = 'zh';
    public const ENGLISH = 'en';
    public const GREEK = 'el';
    public const JAPANESE = 'ja';
    public const PERSIAN = 'fa';
    public const RUSSIAN = 'ru';

    public static function getOptions(): array
    {
        return [
            self::ARABIC,
            self::GREEK,
            self::ENGLISH,
            self::PERSIAN,
            self::JAPANESE,
            self::RUSSIAN,
            self::CHINESE,
        ];
    }
}