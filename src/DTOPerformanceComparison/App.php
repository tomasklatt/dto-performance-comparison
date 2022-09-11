<?php

declare(strict_types=1);

namespace DTOPerformanceComparison;

use DTOPerformanceComparison\DTOs\OwnDTO\ResultsDTO;
use DTOPerformanceComparison\Runner\AssociativeArraySpeedRunner;
use DTOPerformanceComparison\Runner\OwnDTOSpeedRunner;
use DTOPerformanceComparison\Runner\SpatieDTOySpeedRunner;

class App
{
    private const PARAM_COUNT = ['-c', '-count'];
    private const PARAM_SEED = ['-s', '-seed'];

    private int $count = 20;
    private int $seed = 1234;

    private OutputGenerator $outputGenerator;

    public function __construct(private readonly array $args)
    {
        $this->outputGenerator = new OutputGenerator();
    }

    public function run(): void
    {
        if(count($this->args) === 1){
            $this->outputGenerator->printHelp();
        } else {
            $this->outputGenerator->printResults($this->runWithParams());
        }
    }

    private function runWithParams(): ResultsDTO
    {
        $this->parseParams();
        $dataGenerator = new DataGenerator(leagueMaxCount: $this->count, seed: $this->seed);
        $generatedData = $dataGenerator->generate();
        $results = new ResultsDTO(
            topLevelObjectCount: $dataGenerator->getTopLevelObjectCount(),
            totalObjectCount: $dataGenerator->getTotalObjectCount()
        );
        $results->results['Associative array'] = (new AssociativeArraySpeedRunner($generatedData))->run();
        $results->results['Spatie DTO'] = (new SpatieDTOySpeedRunner($generatedData))->run();
        $results->results['Own DTO'] = (new OwnDTOSpeedRunner($generatedData))->run();
        return $results;
    }

    private function parseParams(): void
    {
        foreach ($this->args as $key => $value) {
            if (in_array($value, self::PARAM_COUNT) ){
                $this->count = intval($this->args[$key+1] ?? 0);
            } elseif (in_array($value, self::PARAM_SEED)) {
                $this->seed = intval($this->args[$key+1] ?? 0);
            }
        }
    }
}