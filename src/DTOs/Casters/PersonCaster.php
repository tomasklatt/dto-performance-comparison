<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\Casters;

use DTOPerformanceComparison\DTOs\PersonOwnDTO;

class PersonCaster
{
    public static function cast(array $value): array
    {
        return [
            'name' => $value['name'],
            'dateBorn' => $value['dateBorn'],
            'kids' => \array_map(
                fn (array $kid) => new PersonOwnDTO(...self::cast($kid)),
                $value['kids'] ?? [],
            ),
            'wife' => $value['wife'] ?? '',
        ];
    }
}