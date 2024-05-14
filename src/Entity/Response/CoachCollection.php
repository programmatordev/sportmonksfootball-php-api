<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Coach;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class CoachCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Coach[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Coach::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}