<?php

declare(strict_types=1);

namespace DTOPerformanceComparison;

use DTOPerformanceComparison\DTOs\ResultsOwnDTO;
use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;

final class App extends CLI
{
    private const PARAM_COUNT = ['-c', '-count'];

    private int $count = 20;

    private function runWithParams(Options $options): ResultsOwnDTO
    {
        $this->parseParams($options);
        $dataGenerator = new DataGenerator(leagueMaxCount: $this->count);
        $generatedData = $dataGenerator->generate();
        $results = new ResultsOwnDTO(
            topLevelObjectCount: $dataGenerator->getTopLevelObjectCount(),
            totalObjectCount: $dataGenerator->getTotalObjectCount()
        );
        foreach (array_diff(scandir(__DIR__ . '/Runner'), array('.', '..', 'AbstractRunner.php')) as $runner){
            if(!str_ends_with($runner, '.php')){
                continue;
            }
            $className =  substr($runner, 0, strlen($runner) - 4);
            $classNameWithNameSpace = 'DTOPerformanceComparison\Runner\\' . $className;
            $results->results[$className] = (new $classNameWithNameSpace($generatedData))->run();
        }
        return $results;
    }

    private function parseParams(Options $options): void
    {
        $args = $options->getArgs();
        foreach ($args as $key => $value) {
            if (in_array($value, self::PARAM_COUNT) ){
                $this->count = intval($args[$key+1] ?? 0);
            }
        }
    }

    protected function setup(Options $options): void
    {
        $options->setHelp('Compare performance of associative arrays, SpatieDTO and own written DTO.');
        $options->registerOption('count', 'Count of leagues generated', 'c');
    }

    protected function main(Options $options): void
    {
        if (in_array('run', $options->getArgs())) {
            $this->printResults($this->runWithParams($options));
        } else {
            echo $options->help();
        }
    }

    private function printResults(ResultsOwnDTO $results): void
    {
        $this->colors->disable();
        $this->info('Test finished, tested on dataset with ' . $results->topLevelObjectCount . ' top level objects count and ' . $results->totalObjectCount . ' total objects count.');
        $this->info(str_pad('', 100, '='));
        $this->prepareResultsTableRow('Test name', 'Time spent (ms)', 'Mem. used (kb)');
        $this->info(str_pad('', 100, '-'));
        foreach ($results->results as $testName => $testResult) {
            $this->prepareResultsTableRow($testName, strval($testResult->timeSpent), strval($testResult->memoryUsed));
        }
    }

    private function prepareResultsTableRow(string $rowTitle, string $timeSpent, string $memoryUsed): void
    {
        $this->info(str_pad($rowTitle, 50) . str_pad($timeSpent, 25). str_pad($memoryUsed, 25));
    }
}