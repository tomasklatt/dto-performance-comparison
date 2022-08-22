<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\DTOs\SpatieDTO;

use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\Casters\DataTransferObjectCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ClubDTO extends DataTransferObject
{
    #[MapFrom('name')]
    public readonly string $name;

    #[MapFrom('dateFounded')]
    public readonly string $dateFounded;

    #[MapFrom('owner')]
    public readonly PersonDTO|null $owner;

    #[MapFrom('trophyCount')]
    public readonly int $trophyCount;

    /** @var PersonDTO[] */
    #[MapFrom('players')]
    #[CastWith(ArrayCaster::class, PersonDTO::class)]
    public array|null $players;

    #[MapFrom('coach')]
    public readonly PersonDTO|null $coach;

    #[MapFrom('manager')]
    public readonly PersonDTO|null $manager;
}