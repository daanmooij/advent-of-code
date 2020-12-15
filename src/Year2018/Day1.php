<?php

namespace DaanMooij\AdventOfCode\Year2018;

use DaanMooij\AdventOfCode\Day;
use Exception;

class Day1 implements Day
{
    /**
     * @var array<int>
     */
    private array $changes = [];

    /**
     * @return void
     */
    public function loadInput(): void
    {
        $filepath = __DIR__ . '/input/day-1.txt';
        $input = fopen($filepath, "r");

        if (!is_resource($input)) {
            throw new Exception("Could not open input file: {$filepath}");
        }

        while (!feof($input)) {
            $this->changes[] = intval(fgets($input));
        }
        fclose($input);
    }

    /**
     * @return void
     */
    public function solve(): void
    {
        printf("The resulting frequency is: %s\n", $this->calculateFrequency());
        printf("The first frequency that's reached twice is: %s\n", $this->getFrequencyReachedTwice());
    }

    /**
     * @param array<int> $changes
     * @return void
     */
    public function setChanges(array $changes): void
    {
        $this->changes = $changes;
    }

    /**
     * @return array<int>
     */
    public function getChanges(): array
    {
        return $this->changes;
    }

    /**
     * @param int $frequency -> The starting frequency
     * @return int
     */
    public function calculateFrequency(int $frequency = 0): int
    {
        foreach ($this->changes as $change) {
            $frequency += $change;
        }

        return $frequency;
    }

    /**
     * @param int $frequency -> The starting frequency
     * @return int
     */
    public function getFrequencyReachedTwice(int $frequency = 0): int
    {
        $memory = [$frequency => 1];

        $found = false;
        while (!$found) {
            foreach ($this->changes as $change) {
                $frequency += $change;

                if (isset($memory[$frequency])) {
                    $found = true;
                    break;
                }

                $memory[$frequency] = 1;
            }
        }

        return $frequency;
    }
}
