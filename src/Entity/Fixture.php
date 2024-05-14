<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class Fixture
{
    use EntityTrait;

    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?int $groupId;

    private ?int $aggregateId;

    private ?int $roundId;

    private int $stateId;

    private ?int $venueId;

    private ?string $name;

    private ?\DateTimeImmutable $startingAt;

    private ?string $resultInfo;

    private ?string $leg;

    private ?string $details;

    private ?int $length;

    private ?bool $isPlaceholder;

    private ?bool $hasOdds;

    private ?Sport $sport;

    private ?Stage $stage;

    private ?League $league;

    private ?Round $round;

    private ?Group $group;

    private ?Aggregate $aggregate;

    private ?Season $season;

    private ?Venue $venue;

    private ?State $state;

    /** @var ?Lineup[] */
    private ?array $lineups;

    /** @var ?Commentary[] */
    private ?array $comments;

    /** @var ?Team[] */
    private ?array $participants;

    /** @var ?Odd[] */
    private ?array $odds;

    /** @var ?Metadata[] */
    private ?array $metadata;

    private ?WeatherReport $weatherReport;

    /** @var ?Event[] */
    private ?array $events;

    /** @var ?Event[] */
    private ?array $timeline;

    /** @var ?FixtureStatistic[] */
    private ?array $statistics;

    /** @var ?Period[] */
    private ?array $periods;

    /** @var ?Formation[] */
    private ?array $formations;

    /** @var ?Score[] */
    private ?array $scores;

    /** @var ?FixtureTvStation[] */
    private ?array $tvStations;

    /** @var ?FixtureReferee[] */
    private ?array $referees;

    /** @var ?FixtureSidelined[] */
    private ?array $sidelined;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];
        $this->groupId = $data['group_id'] ?? null;
        $this->aggregateId = $data['aggregate_id'] ?? null;
        $this->roundId = $data['round_id'] ?? null;
        $this->stateId = $data['state_id'];
        $this->venueId = $data['venue_id'] ?? null;

        // select
        $this->name = $data['name'] ?? null;
        $this->startingAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at'], new \DateTimeZone($timezone)) : null;
        $this->resultInfo = $data['result_info'] ?? null;
        $this->leg = $data['leg'] ?? null;
        $this->details = $data['details'] ?? null;
        $this->length = $data['length'] ?? null;
        $this->isPlaceholder = $data['placeholder'] ?? null;
        $this->hasOdds = $data['has_odds'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage'], $timezone) : null;
        $this->league = isset($data['league']) ? new League($data['league'], $timezone) : null;
        $this->round = isset($data['round']) ? new Round($data['round'], $timezone) : null;
        $this->group = isset($data['group']) ? new Group($data['group']) : null;
        $this->aggregate = isset($data['aggregate']) ? new Aggregate($data['aggregate'], $timezone) : null;
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
        $this->venue = isset($data['venue']) ? new Venue($data['venue'], $timezone) : null;
        $this->state = isset($data['state']) ? new State($data['state']) : null;
        $this->lineups = isset($data['lineups']) ? $this->createEntityCollection(Lineup::class, $data['lineups'], $timezone) : null;
        $this->comments = isset($data['comments']) ? $this->createEntityCollection(Commentary::class, $data['comments'], $timezone) : null;
        $this->participants = isset($data['participants']) ? $this->createEntityCollection(Team::class, $data['participants'], $timezone) : null;
        $this->odds = isset($data['odds']) ? $this->createEntityCollection(Odd::class, $data['odds'], $timezone) : null;
        $this->metadata = isset($data['metadata']) ? $this->createEntityCollection(Metadata::class, $data['metadata']) : null;
        $this->weatherReport = isset($data['weatherreport']) ? new WeatherReport($data['weatherreport'], $timezone) : null;
        $this->events = isset($data['events']) ? $this->createEntityCollection(Event::class, $data['events'], $timezone) : null;
        $this->timeline = isset($data['timeline']) ? $this->createEntityCollection(Event::class, $data['timeline'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(FixtureStatistic::class, $data['statistics'], $timezone) : null;
        $this->periods = isset($data['periods']) ? $this->createEntityCollection(Period::class, $data['periods'], $timezone) : null;
        $this->formations = isset($data['formations']) ? $this->createEntityCollection(Formation::class, $data['formations'], $timezone) : null;
        $this->scores = isset($data['scores']) ? $this->createEntityCollection(Score::class, $data['scores'], $timezone) : null;
        $this->tvStations = isset($data['tvstations']) ? $this->createEntityCollection(FixtureTvStation::class, $data['tvstations'], $timezone) : null;
        $this->referees = isset($data['referees']) ? $this->createEntityCollection(FixtureReferee::class, $data['referees'], $timezone) : null;
        $this->sidelined = isset($data['sidelined']) ? $this->createEntityCollection(FixtureSidelined::class, $data['sidelined'], $timezone) : null;

        // TODO trends, inplayOdds, prematchNews, predictions, ballCoordinates
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getLeagueId(): int
    {
        return $this->leagueId;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getStageId(): int
    {
        return $this->stageId;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getAggregateId(): ?int
    {
        return $this->aggregateId;
    }

    public function getRoundId(): ?int
    {
        return $this->roundId;
    }

    public function getStateId(): int
    {
        return $this->stateId;
    }

    public function getVenueId(): ?int
    {
        return $this->venueId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->startingAt;
    }

    public function getResultInfo(): ?string
    {
        return $this->resultInfo;
    }

    public function getLeg(): ?string
    {
        return $this->leg;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function isPlaceholder(): ?bool
    {
        return $this->isPlaceholder;
    }

    public function hasOdds(): ?bool
    {
        return $this->hasOdds;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function getAggregate(): ?Aggregate
    {
        return $this->aggregate;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function getLineups(): ?array
    {
        return $this->lineups;
    }

    public function getComments(): ?array
    {
        return $this->comments;
    }

    public function getParticipants(): ?array
    {
        return $this->participants;
    }

    public function getOdds(): ?array
    {
        return $this->odds;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function getWeatherReport(): ?WeatherReport
    {
        return $this->weatherReport;
    }

    public function getEvents(): ?array
    {
        return $this->events;
    }

    public function getTimeline(): ?array
    {
        return $this->timeline;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }

    public function getPeriods(): ?array
    {
        return $this->periods;
    }

    public function getFormations(): ?array
    {
        return $this->formations;
    }

    public function getScores(): ?array
    {
        return $this->scores;
    }

    public function getTvStations(): ?array
    {
        return $this->tvStations;
    }

    public function getReferees(): ?array
    {
        return $this->referees;
    }

    public function getSidelined(): ?array
    {
        return $this->sidelined;
    }
}