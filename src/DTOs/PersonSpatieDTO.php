<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PersonSpatieDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateBorn')]
    public readonly string $dateBorn;

    /** @var PersonSpatieDTO[] */
    #[MapFrom('kids')]
    #[CastWith(ArrayCaster::class, itemType: PersonSpatieDTO::class)]
    public readonly array|null $kids;

    #[MapFrom('wife')]
    public readonly string|null $wife;
}