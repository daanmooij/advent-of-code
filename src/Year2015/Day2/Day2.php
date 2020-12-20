<?php

namespace DaanMooij\AdventOfCode\Year2015\Day2;

use Exception;
use DaanMooij\AdventOfCode\Day;
use DaanMooij\AdventOfCode\Year2015\Day2\Present;

class Day2 implements Day
{
    /** @var array<string> */
    private array $dimensions = [];

    /** @return void */
    public function loadInput(): void
    {
        $filepath = __DIR__ . "/input.txt";
        $file = file($filepath);

        if (!is_array($file)) {
            throw new Exception("Could not open input file: {$filepath}");
        }

        $this->dimensions = $file;
    }

    /** @return void */
    public function solve(): void
    {
        $amountWrappingPaper = 0;
        foreach ($this->dimensions as $dimension) {
            $present = Present::fromString($dimension);
            $amountWrappingPaper += $present->getSurfaceArea();
            $amountWrappingPaper += $present->getSmallestSideArea();
        }

        printf("The total amount of wrapping paper is: %s\n", $amountWrappingPaper);
    }

    /** @return array<string> */
    public function getDimensions(): array
    {
        return $this->dimensions;
    }
}
