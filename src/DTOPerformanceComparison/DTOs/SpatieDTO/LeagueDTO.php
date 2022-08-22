<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\SpatieDTO;

use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class LeagueDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateFounded')]
    public readonly string $dateFounded;

    #[MapFrom('country')]
    public readonly string $country;

    /** @var ClubDTO[] */
    #[MapFrom('clubs')]
    #[CastWith(ArrayCaster::class, itemType: ClubDTO::class)]
    public readonly array|null $clubs;
}