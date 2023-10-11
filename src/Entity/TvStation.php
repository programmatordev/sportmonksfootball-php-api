<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TvStation
{
    use CreateEntityCollectionTrait;

    private int $id;

    private ?string $name;

    private ?string $url;

    private ?string $imagePath;

    private ?string $type;

    private ?int $relatedId;

    /** @var ?Country[] */
    private ?array $countries;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->url = $data['url'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->relatedId = $data['related_id'] ?? null;

        // include
        $this->countries = isset($data['countries']) ? $this->createEntityCollection(Country::class, $data['countries']) : null;

        // TODO fixtures(?)
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getRelatedId(): ?int
    {
        return $this->relatedId;
    }

    public function getCountries(): ?array
    {
        return $this->countries;
    }
}