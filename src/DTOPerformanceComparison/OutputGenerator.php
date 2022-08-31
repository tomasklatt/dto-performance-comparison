<?php

declare(strict_types=1);

namespace DTOPerformanceComparison;

use DTOPerformanceComparison\DTOs\OwnDTO\ResultsDTO;

class OutputGenerator
{
    private const OUTPUT_COLOR = "\033[";
    private const OUTPUT_COLOR_YELLOW = self::OUTPUT_COLOR . "33m";
    private const OUTPUT_COLOR_GREEN = self::OUTPUT_COLOR . "32m";
    private const OUTPUT_COLOR_WHITE = self::OUTPUT_COLOR . "0m";

    private string $outputBuffer = '';

    private function prepareString(string $text, string $color = self::OUTPUT_COLOR_WHITE): void
    {
        $this->outputBuffer .= $color . $text;
    }

    private function prepareYellowString(string $text): void
    {
        $this->prepareString(text: $text, color: self::OUTPUT_COLOR_YELLOW);
    }

    private function prepareGreenString(string $text): void
    {
        $this->prepareString(text: $text, color: self::OUTPUT_COLOR_GREEN);
    }

    public function printHelp(): void
    {
        $this->prepareYellowString("Usage:" . PHP_EOL);
        $this->prepareString(" command [options] [arguments]" . PHP_EOL);
        $this->prepareYellowString("Options:" . PHP_EOL);
        $this->prepareGreenString("  -c, --count                    ");
        $this->prepareString("Count of leagues generated" . PHP_EOL);
        $this->prepareGreenString("  -s, --seed                     ");
        $this->prepareString("Numeric value of Fake's seed" . PHP_EOL);
        $this->prepareYellowString("Available commands:" . PHP_EOL);
        $this->prepareGreenString("  run                ");
        $this->prepareString("Run comparison with given parameters." . PHP_EOL);
        echo $this->outputBuffer;
    }

    public function printResults(ResultsDTO $results): void
    {
        $this->prepareString('Test finished, tested on dataset with ' . $results->topLevelObjectCount . ' top level objects count and ' . $results->totalObjectCount . ' total objects count.' . PHP_EOL);
        $this->prepareString(str_pad('', 100, '=') . PHP_EOL);
        $this->prepareResultsTableRow('Test name', 'Time spent (ms)', 'Mem. used (kb)');
        $this->prepareString(str_pad('', 100, '-') . PHP_EOL);
        foreach ($results->results as $testName => $testResult) {
            $this->prepareResultsTableRow($testName, strval($testResult->timeSpent), strval($testResult->memoryUsed));
        }
        echo $this->outputBuffer;
    }

    private function prepareResultsTableRow(string $rowTitle, string $timeSpent, string $memoryUsed): void
    {
        $this->prepareString(str_pad($rowTitle, 50) . str_pad($timeSpent, 25). str_pad($memoryUsed, 25) . PHP_EOL);
    }
}