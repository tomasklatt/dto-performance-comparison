<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

class ClubOwnDTO
{
    public function __construct(
        public readonly string       $name,
        public readonly string       $dateFounded,
        public readonly PersonOwnDTO $owner,
        public readonly int          $trophyCount,
        public array|null            $players,
        public readonly PersonOwnDTO $coach,
        public readonly PersonOwnDTO $manager,
    ) {
    }
}