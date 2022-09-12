<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\Casters;

use DTOPerformanceComparison\DTOs\PersonOwnDTO;

class ClubCaster
{
    public static function cast(array $value): array
    {
        return [
            'name' => $value['name'],
            'dateFounded' => $value['dateFounded'],
            'owner' => new PersonOwnDTO(...PersonCaster::cast($value['owner'])),
            'trophyCount' => $value['trophyCount'],
            'players' => \array_map(
                fn (array $player) => new PersonOwnDTO(...PersonCaster::cast($player)),
                $value['players'],
            ),
            'coach' => new PersonOwnDTO(...PersonCaster::cast($value['coach'])),
            'manager' => new PersonOwnDTO(...PersonCaster::cast($value['manager'])),
        ];
    }
}