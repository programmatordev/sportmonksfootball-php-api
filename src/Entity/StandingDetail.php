<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class StandingDetail
{
    private int $id;

    private int $typeId;

    private int $standingId;

    private string $standingType;

    private int $value;

    private ?Type $type;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->typeId = $data['type_id'];
        $this->standingId = $data['standing_id'];
        $this->standingType = $data['standing_type'];
        $this->value = $data['value'];

        // include
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getStandingId(): int
    {
        return $this->standingId;
    }

    public function getStandingType(): string
    {
        return $this->standingType;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}