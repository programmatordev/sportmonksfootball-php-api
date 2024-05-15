<?php

namespace ProgrammatorDev\SportMonksFootball;

use Http\Message\Authentication\QueryParam;
use ProgrammatorDev\Api\Api;
use ProgrammatorDev\Api\Event\ResponseContentsEvent;
use ProgrammatorDev\SportMonksFootball\Language\Language;
use ProgrammatorDev\SportMonksFootball\Resource\BookmakerResource;

class SportMonksFootball extends Api
{
    private array $options;

    public function __construct(
        #[\SensitiveParameter] private string $apiKey,
        array $options = []
    )
    {
        parent::__construct();

        $this->options = $this->configureOptions($options);
        $this->configureApi();
    }

    public function bookmakers(): BookmakerResource
    {
        return new BookmakerResource($this);
    }

//    public function cities(): CityEndpoint
//    {
//        return new CityEndpoint($this);
//    }
//
//    public function coaches(): CoachEndpoint
//    {
//        return new CoachEndpoint($this);
//    }
//
//    public function commentaries(): CommentaryEndpoint
//    {
//        return new CommentaryEndpoint($this);
//    }
//
//    public function continents(): ContinentEndpoint
//    {
//        return new ContinentEndpoint($this);
//    }
//
//    public function countries(): CountryEndpoint
//    {
//        return new CountryEndpoint($this);
//    }
//
//    public function filters(): FilterEndpoint
//    {
//        return new FilterEndpoint($this);
//    }
//
//    public function fixtures(): FixtureEndpoint
//    {
//        return new FixtureEndpoint($this);
//    }
//
//    public function leagues(): LeagueEndpoint
//    {
//        return new LeagueEndpoint($this);
//    }
//
//    public function livescores(): LivescoreEndpoint
//    {
//        return new LivescoreEndpoint($this);
//    }
//
//    public function markets(): MarketEndpoint
//    {
//        return new MarketEndpoint($this);
//    }
//
//    public function players(): PlayerEndpoint
//    {
//        return new PlayerEndpoint($this);
//    }
//
//    public function preMatchOdds(): PreMatchOddEndpoint
//    {
//        return new PreMatchOddEndpoint($this);
//    }
//
//    public function referees(): RefereeEndpoint
//    {
//        return new RefereeEndpoint($this);
//    }
//
//    public function regions(): RegionEndpoint
//    {
//        return new RegionEndpoint($this);
//    }
//
//    public function rivals(): RivalEndpoint
//    {
//        return new RivalEndpoint($this);
//    }
//
//    public function rounds(): RoundEndpoint
//    {
//        return new RoundEndpoint($this);
//    }
//
//    public function schedules(): ScheduleEndpoint
//    {
//        return new ScheduleEndpoint($this);
//    }
//
//    public function seasons(): SeasonEndpoint
//    {
//        return new SeasonEndpoint($this);
//    }
//
//    public function stages(): StageEndpoint
//    {
//        return new StageEndpoint($this);
//    }
//
//    public function standings(): StandingEndpoint
//    {
//        return new StandingEndpoint($this);
//    }
//
//    public function states(): StateEndpoint
//    {
//        return new StateEndpoint($this);
//    }
//
//    public function statistics(): StatisticEndpoint
//    {
//        return new StatisticEndpoint($this);
//    }
//
//    public function teams(): TeamEndpoint
//    {
//        return new TeamEndpoint($this);
//    }
//
//    public function teamSquads(): TeamSquadEndpoint
//    {
//        return new TeamSquadEndpoint($this);
//    }
//
//    public function timezones(): TimezoneEndpoint
//    {
//        return new TimezoneEndpoint($this);
//    }
//
//    public function topscorers(): TopscorerEndpoint
//    {
//        return new TopscorerEndpoint($this);
//    }
//
//    public function transfers(): TransferEndpoint
//    {
//        return new TransferEndpoint($this);
//    }
//
//    public function tvStations(): TvStationEndpoint
//    {
//        return new TvStationEndpoint($this);
//    }
//
//    public function types(): TypeEndpoint
//    {
//        return new TypeEndpoint($this);
//    }
//
//    public function venues(): VenueEndpoint
//    {
//        return new VenueEndpoint($this);
//    }

    private function configureOptions(array $options): array
    {
        $this->optionsResolver->setDefault('timezone', 'UTC');
        $this->optionsResolver->setDefault('language', Language::ENGLISH);

        $this->optionsResolver->setAllowedTypes('timezone', 'string');
        $this->optionsResolver->setAllowedTypes('language', 'string');

        $this->optionsResolver->setAllowedValues('timezone', \DateTimeZone::listIdentifiers());

        return $this->optionsResolver->resolve($options);
    }

    private function configureApi(): void
    {
        $this->setBaseUrl('https://api.sportmonks.com');

        $this->setAuthentication(new QueryParam(['api_token' => $this->apiKey]));

        $this->addQueryDefault('timezone', $this->options['timezone']);
        $this->addQueryDefault('locale', $this->options['language']);

        $this->addResponseContentsHandler(function(ResponseContentsEvent $event) {
            // decode json string response into an array
            $contents = $event->getContents();
            $contents = \json_decode($contents, true);

            $event->setContents($contents);
        });
    }
}