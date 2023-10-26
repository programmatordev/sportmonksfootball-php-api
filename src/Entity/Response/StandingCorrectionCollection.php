<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\StandingCorrection;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class StandingCorrectionCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var StandingCorrection[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(StandingCorrection::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}