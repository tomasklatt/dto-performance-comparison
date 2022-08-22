<?php

declare(strict_types=1);

namespace DTOPerformanceComparison\SpeedTests;

use DTOPerformanceComparison\DTOs\OwnDTO\ResultDTO;

abstract class SpeedTest
{
    private float $startTime;
    private int $startMemoryUsage;

    protected abstract function parseData();

    protected abstract function filterData();

    protected abstract function sortData();

    public function run(): ResultDTO
    {
        $this->startTime = microtime(true);
        $this->startMemoryUsage = memory_get_usage();
        $this->parseData();
        $this->sortData();
        $this->filterData();
        return $this->getValue();
    }

    private function getValue(): ResultDTO
    {
        return new ResultDTO(
            timeSpent: intval((microtime(true) - $this->startTime) * 1000),
            memoryUsed: intval((memory_get_usage() - $this->startMemoryUsage) / 1024),
        );
    }
}