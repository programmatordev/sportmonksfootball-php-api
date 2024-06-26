<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TypeEntity
{
    use EntityTrait;

    private string $name;

    private \DateTimeImmutable $updatedAt;

    /** @var Type[] */
    private array $types;

    public function __construct(array $data)
    {
        // "_key" index is injected in data to get the key from an associative array response
        // check the EntityTrait
        $this->name = $data['_key'];
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