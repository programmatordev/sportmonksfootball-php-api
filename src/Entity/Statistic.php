<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Statistic
{
    private int $id;

    private int $modelId;

    private int $typeId;

    private ?int $relationId;

    private array $value;

    private ?Type $type;

    private Team|Player|null $participant;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->modelId = $data['model_id'];
        $this->typeId = $data['type_id'];
        $this->relationId = $data['relation_id'] ?? null;
        $this->value = $data['value'];

        // include
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->participant = isset($data['participant'])
            // try to find if participant is Player or Team through value
            ? (isset($this->value['player_id']) ? new Player($data['participant']) : new Team($data['participant']))
            : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getModelId(): int
    {
        return $this->modelId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getRelationId(): ?int
    {
        return $this->relationId;
    }

    public function getValue(): array
    {
        return $this->value;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getParticipant(): Team|Player|null
    {
        return $this->participant;
    }
}