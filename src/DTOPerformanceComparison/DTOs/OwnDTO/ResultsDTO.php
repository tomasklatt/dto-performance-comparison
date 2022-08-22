<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO;

class ResultsDTO
{
    /**
     * @param int $topLevelObjectCount
     * @param int $totalObjectCount
     * @param array<ResultDTO> $results
     */
    public function __construct(
        public readonly int $topLevelObjectCount,
        public readonly int $totalObjectCount,
        public array $results = []
    ) {
    }
}