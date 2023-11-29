<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Player;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class PlayerCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Player[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Player::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}