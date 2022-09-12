<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

class ResultOwnDTO
{
    public function __construct(
        public readonly float $timeSpent,
        public readonly int $memoryUsed,
    ) {
    }
}