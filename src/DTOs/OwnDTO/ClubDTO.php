<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO;

class ClubDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $dateFounded,
        public readonly PersonDTO $owner,
        public readonly int $trophyCount,
        public array|null $players,
        public readonly PersonDTO $coach,
        public readonly PersonDTO $manager,
    ) {
    }
}