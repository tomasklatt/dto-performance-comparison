<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\SpatieDTO;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ClubDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateFounded')]
    public readonly string $dateFounded;

    #[MapFrom('owner')]
    public readonly PersonDTO $owner;

    #[MapFrom('trophyCount')]
    public readonly int $trophyCount;

    /** @var PersonDTO[] */
    #[MapFrom('players')]
    #[CastWith(ArrayCaster::class, PersonDTO::class)]
    public array $players;

    #[MapFrom('coach')]
    public readonly PersonDTO $coach;

    #[MapFrom('manager')]
    public readonly PersonDTO $manager;
}