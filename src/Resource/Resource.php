<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Resource\Util\CacheTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\TimezoneTrait;
use ProgrammatorDev\SportMonksFootball\Resource\Util\ValidationTrait;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

class Resource
{
    use SelectTrait;
    use IncludeTrait;
    use FilterTrait;
    use TimezoneTrait;
    use LanguageTrait;
    use CacheTrait;
    use ValidationTrait;

    public function __construct(protected SportMonksFootball $api) {}
}