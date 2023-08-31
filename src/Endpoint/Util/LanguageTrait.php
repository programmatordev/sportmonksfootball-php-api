<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint\Util;

use ProgrammatorDev\SportMonksFootball\Language\Language;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

trait LanguageTrait
{
    /**
     * @throws ValidationException
     */
    public function withLanguage(string $language): static
    {
        Validator::choice(Language::getOptions())->assert($language, 'language');

        $clone = clone $this;
        $clone->language = $language;

        return $clone;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}