<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class Referee
{
    use EntityCollectionTrait;

    private int $id;

    private int $sportId;

    private ?int $countryId;

    private ?int $cityId;

    private ?string $commonName;

    private ?string $firstName;

    private ?string $lastName;

    private ?string $name;

    private ?string $displayName;

    private ?string $imagePath;

    private ?int $height;

    private ?int $weight;

    private ?\DateTimeImmutable $dateOfBirth;

    private ?string $gender;

    private ?Sport $sport;

    private ?Country $country;

    private ?Country $nationality;

    private ?City $city;

    /** @var ?RefereeStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'] ?? null;
        $this->cityId = $data['city_id'] ?? null;

        // select
        $this->commonName = $data['common_name'] ?? null;
        $this->firstName = $data['firstname'] ?? null;
        $this->lastName = $data['lastname'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->displayName = $data['display_name'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->height = $data['height'] ?? null;
        $this->weight = $data['weight'] ?? null;
        $this->dateOfBirth = isset($data['date_of_birth']) ? new \DateTimeImmutable($data['date_of_birth']) : null;
        $this->gender = $data['gender'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->country = isset($data['country']) ? new Country($data['country'], $timezone) : null;
        $this->nationality = isset($data['nationality']) ? new Country($data['nationality'], $timezone) : null;
        $this->city = isset($data['city']) ? new City($data['city'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(RefereeStatistic::class, $data['statistics'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function getDateOfBirth(): ?\DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}