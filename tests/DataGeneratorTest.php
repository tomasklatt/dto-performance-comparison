<?php

declare(strict_types=1);

use DTOPerformanceComparison\DataGenerator;
use PHPUnit\Framework\TestCase;

class DataGeneratorTest extends TestCase
{
    const LEAGUES_COUNT_EMPTY = 0;
    const LEAGUES_COUNT = 15;

    public function testGenerateEmpty(): void
    {
        $instance = new DataGenerator(self::LEAGUES_COUNT_EMPTY);
        $data = $instance->generate();
        $this->assertIsArray($data);
        $this->assertEmpty($data);
        $this->assertEquals(self::LEAGUES_COUNT_EMPTY, $instance->getTopLevelObjectCount());
        $this->assertEquals(self::LEAGUES_COUNT_EMPTY, $instance->getTotalObjectCount());
    }

    public function testGenerate(): void
    {
        $instance = new DataGenerator(self::LEAGUES_COUNT);
        $data = $instance->generate();
        $this->assertIsArray($data);
        $this->assertIsArray($data['leagues']);
        $this->assertCount(self::LEAGUES_COUNT, $data['leagues']);
        $this->assertEquals(self::LEAGUES_COUNT, $instance->getTopLevelObjectCount());
        $this->assertTrue(self::LEAGUES_COUNT < $instance->getTotalObjectCount());
    }

}