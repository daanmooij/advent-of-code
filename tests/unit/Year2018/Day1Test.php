<?php

namespace DaanMooij\AdventOfCode\Year2018;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function setUp(): void
    {
        $this->day1 = new Day1();
    }

    /**
     * @test
     */
    public function it_loads_the_input_file(): void
    {
        $this->day1->loadInput();

        $this->assertNotEmpty($this->day1->getChanges());
    }

    /**
     * @test
     * @dataProvider changes_with_resulting_frequency
     */
    public function it_returns_the_resulting_frequency(array $changes, int $result): void
    {
        $this->day1->setChanges($changes);

        $this->assertEquals($result, $this->day1->calculateFrequency());
    }

    /**
     * @test
     * @dataProvider changes_with_first_frequency_reached_twice
     */
    public function it_returns_first_frequency_reached_twice(array $changes, int $result): void
    {
        $this->day1->setChanges($changes);

        $this->assertEquals($result, $this->day1->getFrequencyReachedTwice());
    }

    /**
     * @return array
     */
    public function changes_with_resulting_frequency(): array
    {
        return [
            [['+1', '+1', '+1'], 3],
            [['+1', '+1', '-2'], 0],
            [['-1', '-2', '-3'], -6],
            [['+1', '-2', '+3', '+1'], 3]
        ];
    }

    /**
     * @return array
     */
    public function changes_with_first_frequency_reached_twice(): array
    {
        return [
            [['+1', '-1'], 0],
            [['+3', '+3', '+4', '-2', '-4'], 10],
            [['-6', '+3', '+8', '+5', '-6'], 5],
            [['+7', '+7', '-2', '-7', '-4'], 14]
        ];
    }
}
