<?php

namespace DaanMooij\AdventOfCode\Year2018;

use DaanMooij\AdventOfCode\Day;

class Day1 implements Day
{
    /**
     * @var array
     */
    private array $changes;

    public function loadInput(): void
    {
        $file = fopen(__DIR__ . '/input/day-1.txt', "r");
        while (!feof($file)) {
            $this->changes[] = intval(fgets($file));
        }
        fclose($file);
    }

    public function solve()
    {
        $result = $this->calculateFrequency();

        printf('The resulting frequency is: %s', $result);
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
