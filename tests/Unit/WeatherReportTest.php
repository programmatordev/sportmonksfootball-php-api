<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Temperature;
use ProgrammatorDev\SportMonksFootball\Entity\WeatherReport;
use ProgrammatorDev\SportMonksFootball\Entity\Wind;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class WeatherReportTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new WeatherReport([
            'id' => 1,
            'fixture_id' => 1,
            'venue_id' => 1,
            'temperature' => [
                'morning' => 10,
                'day' => 15,
                'evening' => 15,
                'night' => 10
            ],
            'feels_like' => [
                'morning' => 10,
                'day' => 15,
                'evening' => 15,
                'night' => 10
            ],
            'wind' => [
                'speed' => 10,
                'direction' => 10
            ],
            'humidity' => '10%',
            'pressure' => 1000,
            'clouds' => '10%',
            'description' => 'description',
            'icon' => 'https://image.path',
            'type' => 'forecast',
            'metric' => 'celsius',
            'current' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getVenueId());
        $this->assertInstanceOf(Temperature::class, $entity->getTemperature());
        $this->assertInstanceOf(Temperature::class, $entity->getFeelsLike());
        $this->assertInstanceOf(Wind::class, $entity->getWind());
        $this->assertSame('10%', $entity->getHumidity());
        $this->assertSame(1000, $entity->getPressure());
        $this->assertSame('10%', $entity->getClouds());
        $this->assertSame('description', $entity->getDescription());
        $this->assertSame('https://image.path', $entity->getIcon());
        $this->assertSame('forecast', $entity->getType());
        $this->assertSame('celsius', $entity->getMetric());
        $this->assertSame(false, $entity->isCurrent());
    }
}