<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use function DeepCopy\deep_copy;

trait LanguageTrait
{
    public function withLanguage(string $language): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('locale', $language);

        return $clone;
    }
}