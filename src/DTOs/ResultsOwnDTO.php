<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

class ResultsOwnDTO
{
    /**
     * @param int $topLevelObjectCount
     * @param int $totalObjectCount
     * @param array<ResultOwnDTO> $results
     */
    public function __construct(
        public readonly int $topLevelObjectCount,
        public readonly int $totalObjectCount,
        public array $results = []
    ) {
    }
}