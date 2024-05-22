<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class Player extends Person
{
    use EntityTrait;

    private ?int $nationalityId;

    private ?int $positionId;

    private ?int $detailedPositionId;

    private ?int $typeId;

    private ?bool $inSquad;

    private ?City $city;

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

    /** @var ?PlayerStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        $this->nationalityId = $data['nationality_id'] ?? null;
        $this->positionId = $data['position_id'] ?? null;
        $this->detailedPositionId = $data['detailed_position_id'] ?? null;

        // select
        $this->typeId = $data['type_id'] ?? null;
        $this->inSquad = $data['in_squad'] ?? null;

        // include
        $this->city = isset($data['city']) ? new City($data['city'], $timezone) : null;
        $this->teams = isset($data['teams']) ? $this->createEntityCollection(TeamSquad::class, $data['teams'], $timezone) : null;
        $this->trophies = isset($data['trophies']) ? $this->createEntityCollection(ParticipantTrophy::class, $data['trophies'], $timezone) : null;
        $this->transfers = isset($data['transfers']) ? $this->createEntityCollection(Transfer::class, $data['transfers'], $timezone) : null;
        $this->pendingTransfers = isset($data['pendingtransfers']) ? $this->createEntityCollection(Transfer::class, $data['pendingtransfers'], $timezone) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
        $this->detailedPosition = isset($data['detailedposition']) ? new Type($data['detailedposition']) : null;
        $this->lineups = isset($data['lineups']) ? $this->createEntityCollection(Lineup::class, $data['lineups'], $timezone) : null;
        $this->latestLineups = isset($data['latest']) ? $this->createEntityCollection(Lineup::class, $data['latest'], $timezone) : null;
        $this->metadata = isset($data['metadata']) ? $this->createEntityCollection(Metadata::class, $data['metadata']) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(PlayerStatistic::class, $data['statistics'], $timezone) : null;
    }

    public function getNationalityId(): int
    {
        return $this->nationalityId;
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

    public function inSquad(): ?bool
    {
        return $this->inSquad;
    }

    public function getCity(): ?City
    {
        return $this->city;
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

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}