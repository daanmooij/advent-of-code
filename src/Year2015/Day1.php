<?php

namespace DaanMooij\AdventOfCode\Year2015;

use DaanMooij\AdventOfCode\Day;

class Day1 implements Day
{
    const FLOOR_UP = '(';
    const FLOOR_DOWN = ')';
    const STARTING_FLOOR = 0;

    private array $directions = [];

    public function loadInput(): void
    {
        $filepath = __DIR__ . "/input/day-1.txt";

        $this->directions = str_split(file_get_contents($filepath));
    }

    public function solve()
    {
        printf("The resulting floor is: %s\n", $this->calculateFloor(self::STARTING_FLOOR));
        printf(
            "The first direction position that causus Santa to go in the basement is: %s\n",
            $this->calculateFirstBasementDirectionPosition(self::STARTING_FLOOR)
        );
    }

    public function calculateFloor(int $floor = self::STARTING_FLOOR): int
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

    public function calculateFirstBasementDirectionPosition(int $floor = self::STARTING_FLOOR): int
    {
        if ($floor < 0) {
            return 0;
        }

        $basementPostion = 1;
        $inBasement = false;
        while (!$inBasement) {
            foreach ($this->directions as $position => $direction) {
                if ($direction === self::FLOOR_UP) {
                    $floor++;
                } elseif ($direction === self::FLOOR_DOWN) {
                    if ($floor === 0) {
                        $basementPostion = $position + 1;
                        $inBasement = true;
                        break;
                    }
                    $floor--;
                }
                $basementPostion = $position + 1;
            }
        }

        return $basementPostion;
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
