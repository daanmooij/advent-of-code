<?php

namespace DaanMooij\AdventOfCode\Year2018;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    /**
     * @test
     * @dataProvider changes_with_resulting_frequency
     */
    public function it_returns_frequency_from_given_changes(array $changes, int $result): void
    {
        $day1 = new Day1($changes);

        $this->assertEquals($result, $day1->getFrequency(0));
    }

    /**
     * @test
     */
    public function it_returns_frequency_from_changes_in_file(): void
    {
        $day1 = Day1::fromFile('/files/changes.txt');

        $result = $day1->getFrequency(0);

        $this->assertIsInt($result);
    }

    /**
     * @test
     * @dataProvider changes_with_first_frequency_reached_twice
     */
    public function it_returns_first_frequency_reached_twice_from_given_changes(array $changes, int $result): void
    {
        $day1 = new Day1($changes);

        $this->assertEquals($result, $day1->getFrequencyReachedTwice(0));
    }

    /**
     * @test
     */
    public function it_returns_first_frequency_reached_twice_from_changes_in_file(): void
    {
        $day1 = Day1::fromFile('/files/changes.txt');

        $result = $day1->getFrequencyReachedTwice(0);

        $this->assertIsInt($result);
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
