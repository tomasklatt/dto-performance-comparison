<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO;

class LeagueDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $dateFounded,
        public readonly string $country,
        public readonly array|null $clubs,
    ) {
    }
}