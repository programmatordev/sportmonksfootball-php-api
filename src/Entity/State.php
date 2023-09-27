<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class State
{
    private int $id;

    private ?string $state;

    private ?string $name;

    private ?string $shortName;

    private ?string $developerName;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // select
        $this->state = $data['state'];
        $this->name = $data['name'];
        $this->shortName = $data['short_name'];
        $this->developerName = $data['developer_name'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function getDeveloperName(): ?string
    {
        return $this->developerName;
    }
}