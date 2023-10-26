<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class FixtureReferee
{
    private int $id;

    private int $fixtureId;

    private int $refereeId;

    private int $typeId;

    private ?Fixture $fixture;

    private ?Referee $referee;

    private ?Type $type;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->refereeId = $data['referee_id'];
        $this->typeId = $data['type_id'];

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
        $this->referee = isset($data['referee']) ? new Referee($data['referee'], $timezone) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getRefereeId(): int
    {
        return $this->refereeId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getReferee(): ?Referee
    {
        return $this->referee;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}