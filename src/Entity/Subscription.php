<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Subscription
{
    use CreateEntityCollectionTrait;

    private array $meta;

    private array $plans;

    private array $addOns;

    private array $widgets;

    public function __construct(array $data)
    {
        $this->meta = $data['meta'];
        $this->plans = $this->createEntityCollection($data['plans'], Plan::class);
        $this->addOns = $data['add_ons'];
        $this->widgets = $data['widgets'];
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @return Plan[]
     */
    public function getPlans(): array
    {
        return $this->plans;
    }

    public function getAddOns(): array
    {
        return $this->addOns;
    }

    public function getWidgets(): array
    {
        return $this->widgets;
    }
}