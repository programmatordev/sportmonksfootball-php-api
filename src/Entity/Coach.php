<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Coach
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $playerId;

    private int $sportId;

    private int $countryId;

    private int $nationalityId;

    private ?int $cityId;

    private ?string $commonName;

    private ?string $firstName;

    private ?string $lastName;

    private ?string $name;

    private ?string $displayName;

    private ?string $imagePath;

    private ?int $height;

    private ?int $weight;

    private ?\DateTimeImmutable $dateOfBirth;

    private ?string $gender;

    private ?Sport $sport;

    private ?Country $country;

    private ?Country $nationality;

    /** @var ?ParticipantTrophy[] */
    private ?array $trophies;

    private ?Player $player;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->playerId = $data['player_id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'];
        $this->nationalityId = $data['nationality_id'];

        // select
        $this->cityId = $data['city_id'] ?? null;
        $this->commonName = $data['common_name'] ?? null;
        $this->firstName = $data['firstname'] ?? null;
        $this->lastName = $data['lastname'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->displayName = $data['display_name'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->height = $data['height'] ?? null;
        $this->weight = $data['weight'] ?? null;
        $this->dateOfBirth = isset($data['date_of_birth']) ? new \DateTimeImmutable($data['date_of_birth']) : null;
        $this->gender = $data['gender'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->country = isset($data['country']) ? new Country($data['country']) : null;
        $this->nationality = isset($data['nationality']) ? new Country($data['nationality']) : null;
        $this->trophies = isset($data['trophies']) ? $this->createEntityCollection(ParticipantTrophy::class, $data['trophies']) : null;
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures']) : null;

        // TODO teams(?), statistics
    }
}