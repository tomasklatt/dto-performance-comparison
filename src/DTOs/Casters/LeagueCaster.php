<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\Casters;

use DTOPerformanceComparison\DTOs\ClubOwnDTO;

class LeagueCaster
{
    public static function cast(array $value): array
    {
        return [
            'name' => $value['name'],
            'dateFounded' => $value['dateFounded'],
            'clubs' => \array_map(
                fn (array $club) => new ClubOwnDTO(...ClubCaster::cast($club)),
                $value['clubs'],
            ),
            'country' => $value['country'],
        ];
    }
}