<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class StatisticDetail
{
    private int $id;

    private int $typeId;

    private array $value;

    private ?Type $type;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->typeId = $data['type_id'];
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

    public function getValue(): array
    {
        return $this->value;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}