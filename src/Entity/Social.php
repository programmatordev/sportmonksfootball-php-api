<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Social
{
    private int $id;

    private int $socialId;

    private int $socialChannelId;

    private string $value;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->socialId = $data['social_id'];
        $this->socialChannelId = $data['social_channel_id'];
        $this->value = $data['value'];

        // TODO channel
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSocialId(): int
    {
        return $this->socialId;
    }

    public function getSocialChannelId(): int
    {
        return $this->socialChannelId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}