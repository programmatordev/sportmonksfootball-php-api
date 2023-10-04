<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Player
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $sportId;

    private int $countryId;

    private ?int $nationalityId;

    private ?int $cityId;

    private ?int $positionId;

    private ?int $detailedPositionId;

    private ?int $typeId;

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

    private ?City $city;

    private ?Country $nationality;

    /** @var ?TeamSquad[] */
    private ?array $teams;

    /** @var ?ParticipantTrophy[] */
    private ?array $trophies;

    /** @var ?Transfer[] */
    private ?array $transfers;

    /** @var ?Transfer[] */
    private ?array $pendingTransfers;

    private ?Type $position;

    private ?Type $detailedPosition;

    /** @var ?Lineup[] */
    private ?array $lineups;

    /** @var ?Lineup[] */
    private ?array $latestLineups;

    /** @var ?Metadata[] */
    private ?array $metadata;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'];
        $this->nationalityId = $data['nationality_id'] ?? null;
        $this->cityId = $data['city_id'] ?? null;
        $this->positionId = $data['position_id'] ?? null;
        $this->detailedPositionId = $data['detailed_position_id'] ?? null;

        // select
        $this->typeId = $data['type_id'] ?? null;
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
        $this->city = isset($data['city']) ? new City($data['city']) : null;
        $this->nationality = isset($data['nationality']) ? new Country($data['nationality']) : null;
        $this->teams = isset($data['teams']) ? $this->createEntityCollection(TeamSquad::class, $data['teams']) : null;
        $this->trophies = isset($data['trophies']) ? $this->createEntityCollection(ParticipantTrophy::class, $data['trophies']) : null;
        $this->transfers = isset($data['transfers']) ? $this->createEntityCollection(Transfer::class, $data['transfers']) : null;
        $this->pendingTransfers = isset($data['pendingtransfers']) ? $this->createEntityCollection(Transfer::class, $data['pendingtransfers']) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
        $this->detailedPosition = isset($data['detailedposition']) ? new Type($data['detailedposition']) : null;
        $this->lineups = isset($data['lineups']) ? $this->createEntityCollection(Lineup::class, $data['lineups']) : null;
        $this->latestLineups = isset($data['latest']) ? $this->createEntityCollection(Lineup::class, $data['latest']) : null;
        $this->metadata = isset($data['metadata']) ? $this->createEntityCollection(Metadata::class, $data['metadata']) : null;

        // TODO statistics
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getPositionId(): ?int
    {
        return $this->positionId;
    }

    public function getDetailedPositionId(): ?int
    {
        return $this->detailedPositionId;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
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

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    public function getTeams(): ?array
    {
        return $this->teams;
    }

    public function getTrophies(): ?array
    {
        return $this->trophies;
    }

    public function getTransfers(): ?array
    {
        return $this->transfers;
    }

    public function getPendingTransfers(): ?array
    {
        return $this->pendingTransfers;
    }

    public function getPosition(): ?Type
    {
        return $this->position;
    }

    public function getDetailedPosition(): ?Type
    {
        return $this->detailedPosition;
    }

    public function getLineups(): ?array
    {
        return $this->lineups;
    }

    public function getLatestLineups(): ?array
    {
        return $this->latestLineups;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }
}