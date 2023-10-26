<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Type
{
    private int $id;

    private string $name;

    private string $code;

    private string $developerName;

    private string $modelType;

    private ?string $statGroup;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->code = $data['code'];
        $this->developerName = $data['developer_name'];
        $this->modelType = $data['model_type'];
        $this->statGroup = $data['stat_group'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDeveloperName(): string
    {
        return $this->developerName;
    }

    public function getModelType(): string
    {
        return $this->modelType;
    }

    public function getStatGroup(): ?string
    {
        return $this->statGroup;
    }
}