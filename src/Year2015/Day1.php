<?php

namespace DaanMooij\AdventOfCode\Year2015;

use DaanMooij\AdventOfCode\Day;

class Day1 implements Day
{
    const FLOOR_UP = '(';
    const FLOOR_DOWN = ')';

    private array $directions = [];

    public function loadInput(): void
    {
        $filepath = __DIR__ . "/input/day-1.txt";

        $this->directions = str_split(file_get_contents($filepath));
    }

    public function solve()
    {
        printf("The resulting floor is: %s\n", $this->calculateFloor());
    }

    public function calculateFloor(int $floor = 0): int
    {
        foreach ($this->directions as $direction) {
            if ($direction === self::FLOOR_UP) {
                $floor++;
            } elseif ($direction === self::FLOOR_DOWN) {
                $floor--;
            }
        }

        return $floor;
    }

    public function setDirections(array $directions): void
    {
        $this->directions = $directions;
    }

    public function getDirections(): array
    {
        return $this->directions;
    }
}