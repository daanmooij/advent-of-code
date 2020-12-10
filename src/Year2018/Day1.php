<?php

namespace DaanMooij\AdventOfCode\Year2018;

use DaanMooij\AdventOfCode\Day;
use Exception;

class Day1 implements Day
{
    /**
     * @var array
     */
    private array $changes = [];

    public function loadInput(): void
    {
        $filepath = __DIR__ . '/input/day-1.txt';
        $input = fopen($filepath, "r");

        if (!$input) {
            throw new Exception("Could not open input file: {$filepath}");
        }

        while (!feof($input)) {
            $this->changes[] = intval(fgets($input));
        }
        fclose($input);
    }

    public function solve()
    {
        printf("The resulting frequency is: %s\n", $this->calculateFrequency());
        printf("The first frequency that's reached twice is: %s\n", $this->getFrequencyReachedTwice());
    }

    public function setChanges(array $changes): void
    {
        $this->changes = $changes;
    }

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
