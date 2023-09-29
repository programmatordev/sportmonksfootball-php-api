<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Team
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $sportId;

    private int $countryId;

    private ?int $venueId;

    private ?string $gender;

    private ?string $name;

    private ?string $shortCode;

    private ?string $imagePath;

    private ?int $founded;

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

    /** @var ?Squad[] */
    private ?array $players;

    /** @var ?Sidelined[] */
    private ?array $sidelined;

    /** @var ?Sidelined[] */
    private ?array $sidelinedHistory;

    /** @var ?ParticipantTrophy[] */
    private ?array $trophies;

    /** @var ?Social[] */
    private ?array $socials;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'];
        $this->venueId = $data['venue_id'] ?? null;

        // select
        $this->gender = $data['gender'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->shortCode = $data['short_code'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->founded = $data['founded'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->isPlaceholder = $data['placeholder'] ?? null;
        $this->lastPlayedAt = isset($data['last_played_at']) ? new \DateTimeImmutable($data['last_played_at']) : null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->country = isset($data['country']) ? new Country($data['country']) : null;
        $this->latestFixtures = isset($data['latest']) ? $this->createEntityCollection(Fixture::class, $data['latest']) : null;
        $this->upcomingFixtures = isset($data['upcoming']) ? $this->createEntityCollection(Fixture::class, $data['upcoming']) : null;
        $this->seasons = isset($data['seasons']) ? $this->createEntityCollection(Season::class, $data['seasons']) : null;
        $this->activeSeasons = isset($data['activeseasons']) ? $this->createEntityCollection(Season::class, $data['activeseasons']) : null;
        $this->venue = isset($data['venue']) ? new Venue($data['venue']) : null;
        $this->rivals = isset($data['rivals']) ? $this->createEntityCollection(Team::class, $data['rivals']) : null;
        $this->players = isset($data['players']) ? $this->createEntityCollection(Squad::class, $data['players']) : null;
        $this->sidelined = isset($data['sidelined']) ? $this->createEntityCollection(Sidelined::class, $data['sidelined']) : null;
        $this->sidelinedHistory = isset($data['sidelinedhistory']) ? $this->createEntityCollection(Sidelined::class, $data['sidelinedhistory']) : null;
        $this->trophies = isset($data['trophies']) ? $this->createEntityCollection(ParticipantTrophy::class, $data['trophies']) : null;
        $this->socials = isset($data['socials']) ? $this->createEntityCollection(Social::class, $data['socials']) : null;

        // TODO coaches(?), statistics
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

    public function getFounded(): ?int
    {
        return $this->founded;
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
}