<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class Team
{
    use EntityTrait;

    private int $id;

    private int $sportId;

    private ?int $countryId;

    private ?int $venueId;

    private ?string $gender;

    private ?string $name;

    private ?string $shortCode;

    private ?string $imagePath;

    private ?int $foundedAt;

    private ?string $type;

    private ?bool $isPlaceholder;

    private ?\DateTimeImmutable $lastPlayedAt;

    private ?Sport $sport;

    private ?Country $country;

    /** @var ?Fixture[] */
    private ?array $latestFixtures;

    /** @var ?Fixture[] */
    private ?array $upcomingFixtures;

    /** @var ?Season[] */
    private ?array $seasons;

    /** @var ?Season[] */
    private ?array $activeSeasons;

    private ?Venue $venue;

    /** @var ?Team[] */
    private ?array $rivals;

    /** @var ?TeamSquad[] */
    private ?array $players;

    /** @var ?Sidelined[] */
    private ?array $sidelined;

    /** @var ?Sidelined[] */
    private ?array $sidelinedHistory;

    /** @var ?ParticipantTrophy[] */
    private ?array $trophies;

    /** @var ?Social[] */
    private ?array $socials;

    private ?TeamMeta $meta;

    /** @var ?TeamCoach[] */
    private ?array $coaches;

    /** @var ?TeamStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'] ?? null;
        $this->venueId = $data['venue_id'] ?? null;

        // select
        $this->gender = $data['gender'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->shortCode = $data['short_code'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->foundedAt = $data['founded'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->isPlaceholder = $data['placeholder'] ?? null;
        $this->lastPlayedAt = isset($data['last_played_at']) ? new \DateTimeImmutable($data['last_played_at']) : null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->country = isset($data['country']) ? new Country($data['country'], $timezone) : null;
        $this->latestFixtures = isset($data['latest']) ? $this->createEntityCollection(Fixture::class, $data['latest'], $timezone) : null;
        $this->upcomingFixtures = isset($data['upcoming']) ? $this->createEntityCollection(Fixture::class, $data['upcoming'], $timezone) : null;
        $this->seasons = isset($data['seasons']) ? $this->createEntityCollection(Season::class, $data['seasons'], $timezone) : null;
        $this->activeSeasons = isset($data['activeseasons']) ? $this->createEntityCollection(Season::class, $data['activeseasons'], $timezone) : null;
        $this->venue = isset($data['venue']) ? new Venue($data['venue'], $timezone) : null;
        $this->rivals = isset($data['rivals']) ? $this->createEntityCollection(Team::class, $data['rivals'], $timezone) : null;
        $this->players = isset($data['players']) ? $this->createEntityCollection(TeamSquad::class, $data['players'], $timezone) : null;
        $this->sidelined = isset($data['sidelined']) ? $this->createEntityCollection(Sidelined::class, $data['sidelined'], $timezone) : null;
        $this->sidelinedHistory = isset($data['sidelinedhistory']) ? $this->createEntityCollection(Sidelined::class, $data['sidelinedhistory'], $timezone) : null;
        $this->trophies = isset($data['trophies']) ? $this->createEntityCollection(ParticipantTrophy::class, $data['trophies'], $timezone) : null;
        $this->socials = isset($data['socials']) ? $this->createEntityCollection(Social::class, $data['socials']) : null;
        $this->meta = isset($data['meta']) ? new TeamMeta($data['meta']) : null;
        $this->coaches = isset($data['coaches']) ? $this->createEntityCollection(TeamCoach::class, $data['coaches'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(TeamStatistic::class, $data['statistics'], $timezone) : null;
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

    public function getVenueId(): ?int
    {
        return $this->venueId;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getShortCode(): ?string
    {
        return $this->shortCode;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getFoundedAt(): ?int
    {
        return $this->foundedAt;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function isPlaceholder(): ?bool
    {
        return $this->isPlaceholder;
    }

    public function getLastPlayedAt(): ?\DateTimeImmutable
    {
        return $this->lastPlayedAt;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function getLatestFixtures(): ?array
    {
        return $this->latestFixtures;
    }

    public function getUpcomingFixtures(): ?array
    {
        return $this->upcomingFixtures;
    }

    public function getSeasons(): ?array
    {
        return $this->seasons;
    }

    public function getActiveSeasons(): ?array
    {
        return $this->activeSeasons;
    }

    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    public function getRivals(): ?array
    {
        return $this->rivals;
    }

    public function getPlayers(): ?array
    {
        return $this->players;
    }

    public function getSidelined(): ?array
    {
        return $this->sidelined;
    }

    public function getSidelinedHistory(): ?array
    {
        return $this->sidelinedHistory;
    }

    public function getTrophies(): ?array
    {
        return $this->trophies;
    }

    public function getSocials(): ?array
    {
        return $this->socials;
    }

    public function getMeta(): ?TeamMeta
    {
        return $this->meta;
    }

    public function getCoaches(): ?array
    {
        return $this->coaches;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}