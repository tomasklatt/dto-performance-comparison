<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

class LeagueOwnDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $dateFounded,
        public readonly string $country,
        public readonly array $clubs,
    ) {
    }
}