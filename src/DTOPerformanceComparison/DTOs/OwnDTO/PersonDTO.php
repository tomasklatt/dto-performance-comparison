<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\OwnDTO;

class PersonDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $dateBorn,
        public readonly array|null $kids,
        public readonly string|null $wife,
    ) {
    }
}