<?php

namespace DaanMooij\AdventOfCode\Year2015;

use DaanMooij\AdventOfCode\Day;
use Exception;

class Day1 implements Day
{
    const FLOOR_UP = '(';
    const FLOOR_DOWN = ')';
    const STARTING_FLOOR = 0;

    /**
     * @var array<string>
     */
    private array $directions = [];

    /**
     * @return void
     */
    public function loadInput(): void
    {
        $filepath = __DIR__ . "/input/day-1.txt";
        $file = file_get_contents($filepath);

        if (!is_string($file)) {
            throw new Exception("Could not open input file: {$filepath}");
        }

        $this->directions = str_split($file) ?? [];
    }

    /**
     * @return void
     */
    public function solve(): void
    {
        printf("The resulting floor is: %s\n", $this->calculateFloor(self::STARTING_FLOOR));
        printf(
            "The first direction position that causus Santa to go in the basement is: %s\n",
            $this->calculateFirstBasementDirectionPosition(self::STARTING_FLOOR)
        );
    }

    /**
     * @param int $floor
     * @return int
     */
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

    /**
     * @param int $floor
     * @return int
     */
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

    /**
     * @param array<string> $directions
     * @return void
     */
    public function setDirections(array $directions): void
    {
        $this->directions = $directions;
    }

    /**
     * @return array<string>
     */
    public function getDirections(): array
    {
        return $this->directions;
    }
}
