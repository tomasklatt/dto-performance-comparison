<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\SpatieDTO;

use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\Casters\DataTransferObjectCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PersonDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateBorn')]
    public readonly string $dateBorn;

    /** @var PersonDTO[] */
    #[MapFrom('kids')]
    #[CastWith(ArrayCaster::class, itemType: PersonDTO::class)]
    public readonly array|null $kids;

    #[MapFrom('wife')]
    public readonly string|null $wife;
}