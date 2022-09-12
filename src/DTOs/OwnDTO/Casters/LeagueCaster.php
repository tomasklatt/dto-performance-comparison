<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO\Casters;

use DTOPerformanceComparison\DTOs\OwnDTO\ClubDTO;

class LeagueCaster
{
    public static function cast(array $value): array
    {
        return [
            'name' => $value['name'],
            'dateFounded' => $value['dateFounded'],
            'clubs' => \array_map(
                fn (array $club) => new ClubDTO(...ClubCaster::cast($club)),
                $value['clubs'],
            ),
            'country' => $value['country'],
        ];
    }
}