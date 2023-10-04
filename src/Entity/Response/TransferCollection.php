<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Transfer;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TransferCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Transfer[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Transfer::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}