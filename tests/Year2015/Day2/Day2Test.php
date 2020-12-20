<?php

namespace DaanMooij\AdventOfCode\Year2015\Day2;

use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    public function setUp(): void
    {
        $this->day2 = new Day2();
    }

    /** @test */
    public function it_loads_the_input_file()
    {
        $this->day2->loadInput();
        $this->assertNotEmpty($this->day2->getDimensions());
    }
}
