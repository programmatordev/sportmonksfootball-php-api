<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Metadata
{
    private int $id;

    private int $metadatableId;

    private int $typeId;

    private string $valueType;

    private mixed $values;

    private ?Type $type;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->metadatableId = $data['metadatable_id'];
        $this->typeId = $data['type_id'];
        $this->valueType = $data['value_type'];
        $this->values = $data['values'];

        // include
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMetadatableId(): int
    {
        return $this->metadatableId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getValueType(): string
    {
        return $this->valueType;
    }

    public function getValues(): mixed
    {
        return $this->values;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}