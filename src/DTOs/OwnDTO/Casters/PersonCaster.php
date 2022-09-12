<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO\Casters;

use DTOPerformanceComparison\DTOs\OwnDTO\PersonDTO;

class PersonCaster
{
    public static function cast(array $value): array
    {
        return [
            'name' => $value['name'],
            'dateBorn' => $value['dateBorn'],
            'kids' => \array_map(
                fn (array $kid) => new PersonDTO(...self::cast($kid)),
                $value['kids'] ?? [],
            ),
            'wife' => $value['wife'] ?? '',
        ];
    }
}