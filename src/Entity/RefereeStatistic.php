<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class RefereeStatistic extends ParticipantStatistic
{
    use EntityCollectionTrait;

    private int $refereeId;

    /** @var ?RefereeStatisticDetail[] */
    private ?array $details;

    private ?Referee $referee;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        $this->refereeId = $data['referee_id'];

        // include
        $this->details = isset($data['details']) ? $this->createEntityCollection(RefereeStatisticDetail::class, $data['details']) : null;
        $this->referee = isset($data['referee']) ? new Referee($data['referee'], $timezone) : null;
    }

    public function getRefereeId(): int
    {
        return $this->refereeId;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function getReferee(): ?Referee
    {
        return $this->referee;
    }
}