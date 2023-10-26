<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Lineup
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $fixtureId;

    private int $playerId;

    private int $typeId;

    private ?int $positionId;

    private ?int $teamId;

    private ?int $sportId;

    private ?string $formationField;

    private ?int $formationPosition;

    private ?string $playerName;

    private ?int $jerseyNumber;

    private ?Fixture $fixture;

    private ?Player $player;

    private ?Type $type;

    private ?Type $position;

    private ?Type $detailedPosition;

    /** @var ?LineupDetail[] */
    private ?array $details;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->playerId = $data['player_id'];
        $this->typeId = $data['type_id'];
        $this->positionId = $data['position_id'] ?? null;

        // select
        $this->teamId = $data['team_id'] ?? null;
        $this->sportId = $data['sport_id'] ?? null;
        $this->formationField = $data['formation_field'] ?? null;
        $this->formationPosition = $data['formation_position'] ?? null;
        $this->playerName = $data['player_name'] ?? null;
        $this->jerseyNumber = $data['jersey_number'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
        $this->player = isset($data['player']) ? new Player($data['player'], $timezone) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
        $this->detailedPosition = isset($data['detailedposition']) ? new Type($data['detailedposition']) : null;
        $this->details = isset($data['details']) ? $this->createEntityCollection(LineupDetail::class, $data['details'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getPositionId(): ?int
    {
        return $this->positionId;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function getSportId(): ?int
    {
        return $this->sportId;
    }

    public function getFormationField(): ?string
    {
        return $this->formationField;
    }

    public function getFormationPosition(): ?int
    {
        return $this->formationPosition;
    }

    public function getPlayerName(): ?string
    {
        return $this->playerName;
    }

    public function getJerseyNumber(): ?int
    {
        return $this->jerseyNumber;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getPosition(): ?Type
    {
        return $this->position;
    }

    public function getDetailedPosition(): ?Type
    {
        return $this->detailedPosition;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }
}