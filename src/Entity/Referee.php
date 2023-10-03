<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Referee
{
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

    public function __construct(array $data)
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
        $this->country = isset($data['country']) ? new Country($data['country']) : null;
        $this->nationality = isset($data['nationality']) ? new Country($data['nationality']) : null;
        $this->city = isset($data['city']) ? new City($data['city']) : null;

        // TODO statistics
    }
}