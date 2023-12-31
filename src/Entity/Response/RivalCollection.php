<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Rival;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class RivalCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Rival[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Rival::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}