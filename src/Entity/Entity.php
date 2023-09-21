<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Entity
{
    use CreateEntityCollectionTrait;

    private string $name;

    private \DateTimeImmutable $updatedAt;

    /** @var Type[] */
    private array $types;

    public function __construct(array $data, string $name)
    {
        $this->name = $name;
        $this->updatedAt = new \DateTimeImmutable($data['updated_at']);
        $this->types = $this->createEntityCollection(Type::class, $data['types']);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getTypes(): array
    {
        return $this->types;
    }
}