<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Resource\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\TimezoneTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\ValidationTrait;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

class Resource
{
    use TimezoneTrait;
    use LanguageTrait;
    use ValidationTrait;

    public function __construct(protected SportMonksFootball $api) {}
}