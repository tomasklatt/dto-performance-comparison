<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\SpeedTests;

use DTOPerformanceComparison\DTOs\OwnDTO\Casters\LeagueCaster;
use DTOPerformanceComparison\DTOs\OwnDTO\LeagueDTO;

final class OwnDTOSpeedTest extends SpeedTest
{
    /**
     * @var array<LeagueDTO>
     */
    private array $parsedData = [];

    public function __construct(private readonly array $data) {}

    protected function parseData(): void
    {
        foreach ($this->data['leagues'] ?? [] as $league){
            $this->parsedData['leagues'] = new LeagueDTO(...LeagueCaster::cast($league));
        }
    }

    protected function filterData(): void
    {
        foreach ($this->parsedData as $league){
            foreach ($league->clubs as $club){
                $club->players = array_filter($club->players, fn($player) => count($player->kids) > 2);
            }
        }
    }

    protected function sortData(): void
    {
        foreach ($this->parsedData as $league){
            foreach ($league->clubs as $club){
                uasort($club->players, fn($p1, $p2) => $p1->name > $p2->name);
            }
        }
    }
}