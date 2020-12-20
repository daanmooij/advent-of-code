<?php

namespace DaanMooij\AdventOfCode\Year2015\Day2;

use PHPUnit\Framework\TestCase;

class PresentTest extends TestCase
{
    /** @test */
    public function it_initialises_a_sorted_array_of_dimensions()
    {
        $present = new Present(3, 1, 2);

        $this->assertEquals([1, 2, 3], $present->getSortedDimensions());
    }

    /** @test */
    public function it_initialises_from_a_string()
    {
        $present = Present::fromString('1x2x3');

        $this->assertEquals(1, $present->getHeight());
        $this->assertEquals(2, $present->getWidth());
        $this->assertEquals(3, $present->getLength());
    }

    /** @test */
    public function it_calculates_the_volume()
    {
        $present = new Present(3, 1, 2);

        $this->assertEquals(6, $present->getVolume());
    }

    /** @test */
    public function it_returns_the_smallest_side()
    {
        $present = new Present(4, 3, 9);

        $this->assertEquals(3, $present->getSmallestSide());
    }

    /** @test */
    public function it_returns_the_second_smallest_side()
    {
        $present = new Present(4, 5, 6);

        $this->assertEquals(5, $present->getSecondSmallestSide());
    }
}
