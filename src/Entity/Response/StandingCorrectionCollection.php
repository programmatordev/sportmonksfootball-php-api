<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\StandingCorrection;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class StandingCorrectionCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var StandingCorrection[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(StandingCorrection::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}