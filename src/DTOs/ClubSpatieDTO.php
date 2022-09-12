<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ClubSpatieDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateFounded')]
    public readonly string $dateFounded;

    #[MapFrom('owner')]
    public readonly PersonSpatieDTO $owner;

    #[MapFrom('trophyCount')]
    public readonly int $trophyCount;

    /** @var PersonSpatieDTO[] */
    #[MapFrom('players')]
    #[CastWith(ArrayCaster::class, PersonSpatieDTO::class)]
    public array $players;

    #[MapFrom('coach')]
    public readonly PersonSpatieDTO $coach;

    #[MapFrom('manager')]
    public readonly PersonSpatieDTO $manager;
}