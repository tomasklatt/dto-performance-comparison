<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO\Casters;

use DTOPerformanceComparison\DTOs\OwnDTO\PersonDTO;

class ClubCaster
{
    public static function cast(array $value): array
    {
        return [
            'name' => $value['name'],
            'dateFounded' => $value['dateFounded'],
            'owner' => new PersonDTO(...PersonCaster::cast($value['owner'])),
            'trophyCount' => $value['trophyCount'],
            'players' => \array_map(
                fn (array $player) => new PersonDTO(...PersonCaster::cast($player)),
                $value['players'],
            ),
            'coach' => new PersonDTO(...PersonCaster::cast($value['coach'])),
            'manager' => new PersonDTO(...PersonCaster::cast($value['manager'])),
        ];
    }
}