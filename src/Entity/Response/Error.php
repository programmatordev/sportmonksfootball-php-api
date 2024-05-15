<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

class Error extends AbstractResponse
{
    private string $message;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->message = $data['message'];
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}