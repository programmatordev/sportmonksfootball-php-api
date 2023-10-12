<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class StandingRule
{
    private int $id;

    private int $typeId;

    private ?int $modelId;

    private ?string $modelType;

    private ?int $position;

    private ?Type $type;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->typeId = $data['type_id'];

        // select
        $this->modelId = $data['model_id'];
        $this->modelType = $data['model_type'];
        $this->position = $data['position'];

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

    public function getModelId(): ?int
    {
        return $this->modelId;
    }

    public function getModelType(): ?string
    {
        return $this->modelType;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}