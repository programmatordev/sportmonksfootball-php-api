<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Transfer;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TransferCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Transfer[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Transfer::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}