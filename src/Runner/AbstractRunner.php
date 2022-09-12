<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\Runner;

use DTOPerformanceComparison\DTOs\ResultOwnDTO;

abstract class AbstractRunner
{
    private float $startTime;
    private int $startMemoryUsage;

    protected abstract function parseData();

    protected abstract function filterData(); //remove players with 2 or fewer kids

    protected abstract function sortData(); //sort players in all clubs by name

    public function run(): ResultOwnDTO
    {
        $this->startTime = microtime(true);
        $this->startMemoryUsage = memory_get_usage();
        $this->parseData();
        $this->sortData();
        $this->filterData();
        return $this->getValue();
    }

    private function getValue(): ResultOwnDTO
    {
        return new ResultOwnDTO(
            timeSpent: round((microtime(true) - $this->startTime) * 1000, 2),
            memoryUsed: intval((memory_get_usage() - $this->startMemoryUsage) / 1024),
        );
    }
}