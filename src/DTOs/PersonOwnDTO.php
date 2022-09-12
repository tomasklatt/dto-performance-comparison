<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

class PersonOwnDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $dateBorn,
        public readonly array $kids,
        public readonly string $wife,
    ) {
    }
}