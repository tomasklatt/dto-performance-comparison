<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class LeagueSpatieDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateFounded')]
    public readonly string $dateFounded;

    #[MapFrom('country')]
    public readonly string $country;

    /** @var ClubSpatieDTO[] */
    #[MapFrom('clubs')]
    #[CastWith(ArrayCaster::class, itemType: ClubSpatieDTO::class)]
    public readonly array $clubs;
}