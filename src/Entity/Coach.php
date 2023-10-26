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

    /** @var ?TeamCoach[] */
    private ?array $teams;

    /** @var ?CoachStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
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
        $this->country = isset($data['country']) ? new Country($data['country'], $timezone) : null;
        $this->nationality = isset($data['nationality']) ? new Country($data['nationality'], $timezone) : null;
        $this->trophies = isset($data['trophies']) ? $this->createEntityCollection(ParticipantTrophy::class, $data['trophies']) : null;
        $this->player = isset($data['player']) ? new Player($data['player'], $timezone) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures'], $timezone) : null;
        $this->teams = isset($data['teams']) ? $this->createEntityCollection(TeamCoach::class, $data['teams'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(CoachStatistic::class, $data['statistics'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getNationalityId(): int
    {
        return $this->nationalityId;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function getDateOfBirth(): ?\DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    public function getTrophies(): ?array
    {
        return $this->trophies;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getFixtures(): ?array
    {
        return $this->fixtures;
    }

    public function getTeams(): ?array
    {
        return $this->teams;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}