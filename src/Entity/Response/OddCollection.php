<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Odd;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class OddCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Odd[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Odd::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}