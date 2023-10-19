<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class FixtureTvStation
{
    private int $id;

    private int $fixtureId;

    private int $tvStationId;

    private int $countryId;

    private ?Fixture $fixture;

    private ?TvStation $tvStation;

    private ?Country $country;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->tvStationId = $data['tvstation_id'];
        $this->countryId = $data['country_id'];

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture']) : null;
        $this->tvStation = isset($data['tvstation']) ? new TvStation($data['tvstation']) : null;
        $this->country = isset($data['country']) ? new Country($data['country']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getTvStationId(): int
    {
        return $this->tvStationId;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getTvStation(): ?TvStation
    {
        return $this->tvStation;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }
}