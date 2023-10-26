<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Standing
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $participantId;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?int $groupId;

    private ?int $roundId;

    private ?int $standingRuleId;

    private ?int $position;

    private ?string $result;

    private ?int $points;

    private ?Team $participant;

    private ?Season $season;

    private ?League $league;

    private ?Stage $stage;

    private ?Group $group;

    private ?Round $round;

    private ?Sport $sport;

    private ?StandingRule $rule;

    /** @var ?StandingDetail[] */
    private ?array $details;

    /** @var ?StandingForm[] */
    private ?array $form;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->participantId = $data['participant_id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];
        $this->groupId = $data['group_id'] ?? null;
        $this->roundId = $data['round_id'] ?? null;
        $this->standingRuleId = $data['standing_rule_id'] ?? null;

        // select
        $this->position = $data['position'] ?? null;
        $this->result = $data['result'] ?? null;
        $this->points = $data['points'] ?? null;

        // include
        $this->participant = isset($data['participant']) ? new Team($data['participant'], $timezone) : null;
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
        $this->league = isset($data['league']) ? new League($data['league'], $timezone) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage'], $timezone) : null;
        $this->group = isset($data['group']) ? new Group($data['group']) : null;
        $this->round = isset($data['round']) ? new Round($data['round'], $timezone) : null;
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->rule = isset($data['rule']) ? new StandingRule($data['rule'], $timezone) : null;
        $this->details = isset($data['details']) ? $this->createEntityCollection(StandingDetail::class, $data['details']) : null;
        $this->form = isset($data['form']) ? $this->createEntityCollection(StandingForm::class, $data['form'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
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

    public function getRoundId(): ?int
    {
        return $this->roundId;
    }

    public function getStandingRuleId(): ?int
    {
        return $this->standingRuleId;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getRule(): ?StandingRule
    {
        return $this->rule;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function getForm(): ?array
    {
        return $this->form;
    }
}