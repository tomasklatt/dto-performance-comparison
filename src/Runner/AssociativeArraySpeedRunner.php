<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\Runner;

final class AssociativeArraySpeedRunner extends AbstractRunner
{
    public function __construct(private readonly array $data) {}

    protected function parseData(): void
    {
        return;
    }

    protected function filterData(): void
    {
        foreach ($this->data['leagues'] ?? [] as $league){
            foreach ($league['clubs'] as $club){
                $club['players'] = array_filter($club['players'], fn($player) => count($player['kids']) > 2);
            }
        }
    }

    protected function sortData(): void
    {
        //sort players in all clubs by name
        foreach ($this->data['leagues'] ?? [] as $league){
            foreach ($league['clubs'] as $club){
                uasort($club['players'], fn($p1, $p2) => $p1['name'] > $p2['name']);
            }
        }
    }
}