<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class StandingForm
{
    private int $id;

    private int $fixtureId;

    private int $standingId;

    private string $standingType;

    private string $form;

    private int $order;

    private ?Fixture $fixture;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->standingId = $data['standing_id'];
        $this->standingType = $data['standing_type'];
        $this->form = $data['form'];
        $this->order = $data['sort_order'];

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getStandingId(): int
    {
        return $this->standingId;
    }

    public function getStandingType(): string
    {
        return $this->standingType;
    }

    public function getForm(): string
    {
        return $this->form;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }
}