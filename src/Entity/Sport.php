<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Sport
{
    private int $id;

    private ?string $name;

    private ?string $code;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // Select
        $this->name = $data['name'] ?? null;
        $this->code = $data['code'] ?? null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }
}