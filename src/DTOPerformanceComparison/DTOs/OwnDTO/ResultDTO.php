<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO;

class ResultDTO
{
    public function __construct(
        public readonly int $timeSpent,
        public readonly int $memoryUsed,
    ) {
    }
}