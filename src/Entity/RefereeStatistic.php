<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class RefereeStatistic extends ParticipantStatistic
{
    use CreateEntityCollectionTrait;

    private int $refereeId;

    /** @var ?RefereeStatisticDetail[] */
    private ?array $details;

    private ?Referee $referee;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->refereeId = $data['referee_id'];

        // include
        $this->details = isset($data['details']) ? $this->createEntityCollection(RefereeStatisticDetail::class, $data['details']) : null;
        $this->referee = isset($data['referee']) ? new Referee($data['referee']) : null;
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