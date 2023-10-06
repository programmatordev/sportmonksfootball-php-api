<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\Endpoint\CityEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CoachEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CommentaryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CountryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\FilterEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\LeagueEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\PlayerEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RefereeEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RegionEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RivalEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RoundEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ScheduleEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\SeasonEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StageEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StateEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TeamEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TeamSquadEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TransferEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TvStationEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TypeEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\VenueEndpoint;

class SportMonksFootball
{
    public function __construct(private readonly Config $config) {}

    public function config(): Config
    {
        return $this->config;
    }

    public function cities(): CityEndpoint
    {
        return new CityEndpoint($this);
    }

    public function coaches(): CoachEndpoint
    {
        return new CoachEndpoint($this);
    }

    public function commentaries(): CommentaryEndpoint
    {
        return new CommentaryEndpoint($this);
    }

    public function continents(): ContinentEndpoint
    {
        return new ContinentEndpoint($this);
    }

    public function countries(): CountryEndpoint
    {
        return new CountryEndpoint($this);
    }

    public function filters(): FilterEndpoint
    {
        return new FilterEndpoint($this);
    }

    public function leagues(): LeagueEndpoint
    {
        return new LeagueEndpoint($this);
    }

    public function players(): PlayerEndpoint
    {
        return new PlayerEndpoint($this);
    }

    public function referees(): RefereeEndpoint
    {
        return new RefereeEndpoint($this);
    }

    public function regions(): RegionEndpoint
    {
        return new RegionEndpoint($this);
    }

    public function rivals(): RivalEndpoint
    {
        return new RivalEndpoint($this);
    }

    public function rounds(): RoundEndpoint
    {
        return new RoundEndpoint($this);
    }

    public function schedules(): ScheduleEndpoint
    {
        return new ScheduleEndpoint($this);
    }

    public function seasons(): SeasonEndpoint
    {
        return new SeasonEndpoint($this);
    }

    public function stages(): StageEndpoint
    {
        return new StageEndpoint($this);
    }

    public function states(): StateEndpoint
    {
        return new StateEndpoint($this);
    }

    public function teams(): TeamEndpoint
    {
        return new TeamEndpoint($this);
    }

    public function teamSquads(): TeamSquadEndpoint
    {
        return new TeamSquadEndpoint($this);
    }

    public function transfers(): TransferEndpoint
    {
        return new TransferEndpoint($this);
    }

    public function tvStations(): TvStationEndpoint
    {
        return new TvStationEndpoint($this);
    }

    public function types(): TypeEndpoint
    {
        return new TypeEndpoint($this);
    }

    public function venues(): VenueEndpoint
    {
        return new VenueEndpoint($this);
    }
}