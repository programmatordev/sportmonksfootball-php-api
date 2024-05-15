<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Resource\Util\CacheTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\TimezoneTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\ValidationTrait;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

class Resource
{
    use CacheTrait;
    use TimezoneTrait;
    use ValidationTrait;

    public function __construct(protected SportMonksFootball $api) {}
}