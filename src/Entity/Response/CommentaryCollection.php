<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Commentary;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class CommentaryCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Commentary[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Commentary::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}