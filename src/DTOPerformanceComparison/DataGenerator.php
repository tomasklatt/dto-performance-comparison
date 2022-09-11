<?php

declare(strict_types=1);

namespace DTOPerformanceComparison;
use Faker\Factory;
use Faker\Generator;

final class DataGenerator
{
    private readonly Generator $faker;

    private int $leagueCount = 0;
    private int $clubCount = 0;
    private int $personCount = 0;

    public function __construct(private readonly int $leagueMaxCount, int $seed)
    {
        $this->faker = Factory::create();
        $this->faker->seed($seed);
    }

    public function generate(): array
    {
        $generatedData = [];
        while ($this->leagueCount < $this->leagueMaxCount){
            $generatedData['leagues'][] = $this->generateLeague();
        }
        return $generatedData;
    }

    public function getTotalObjectCount(): int
    {
        return $this->leagueCount + $this->clubCount + $this->personCount;
    }

    public function getTopLevelObjectCount(): int
    {
        return $this->leagueCount;
    }

    private function generateLeague(): array
    {
        $this->leagueCount++;
        $country = $this->faker->country();
        return [
            'name' => $country . ' league',
            'dateFounded' => $this->faker->date(),
            'country' => $country,
            'clubs' => $this->generateCollections(
                $this->faker->numberBetween(2, 5),
                $this->generateClub(...)
            )
        ];
    }

    private function generateClub(): array
    {
        $this->clubCount++;
        $city = $this->faker->city();
        return [
            'name' => 'FC ' . $city,
            'dateFounded' => $this->faker->date(),
            'owner' => $this->generatePerson(),
            'trophyCount' => $this->faker->numberBetween(0, 50),
            'players' => $this->generateCollections(
                $this->faker->numberBetween(5, 10),
                $this->generatePerson(...)
            ),
            'coach' => $this->generatePerson(),
            'manager' => $this->generatePerson()
        ];
    }

    private function generatePerson(bool $isKid = false): array
    {
        $this->personCount++;
        $person = [
            'name' => $this->faker->name('male'),
            'dateBorn' => $this->faker->date(),
        ];
        if(!$isKid){
            $person['wife'] = $this->faker->name('female');
            $person['kids'] = $this->generateCollections(
                $this->faker->numberBetween(0, 3),
                $this->generatePerson(...),
                true
            );
        }
        return $person;
    }

    private function generateCollections(int $count, callable $call, ...$args): array
    {
        $objects = [];
        while($count > 0){
            $objects[] = $call(...$args);
            $count--;
        }
        return $objects;
    }
}