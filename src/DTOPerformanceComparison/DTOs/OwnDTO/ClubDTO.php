<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO;

class ClubDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $dateFounded,
        public readonly PersonDTO|null $owner,
        public readonly int $trophyCount,
        public array|null $players,
        public readonly PersonDTO|null $coach,
        public readonly PersonDTO|null $manager,
    ) {
    }
}