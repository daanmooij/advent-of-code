<?php

namespace DaanMooij\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function setUp(): void
    {
        $this->day1 = new Day1();
    }

    /** 
     * @test 
     */
    public function it_loads_the_input_file(): void
    {
        $this->day1->loadInput();

        $this->assertNotEmpty($this->day1->getDirections());
    }

    /**
     * @test
     * @dataProvider directions_with_resulting_floor
     */
    public function it_returns_the_resulting_floor(array $directions, int $result, int $startingFloor = 0): void
    {
        $this->day1->setDirections($directions);

        $this->assertEquals($result, $this->day1->calculateFloor($startingFloor));
    }

    /**
     * @return array
     */
    public function directions_with_resulting_floor(): array
    {
        return [
            [['(', '(', ')', ')'], 3, 3],
            [['(', ')', '(', ')'], -5, -5],
            [['(', '(', '('], 3],
            [['(', '(', ')', '(', '(', ')', '('], 3],
            [[')', ')', '(', '(', '(', '(', '('], 3],
            [['(', ')', ')'], -1],
            [[')', ')', '('], -1],
            [[')', ')', ')'], -3],
            [[')', '(', ')', ')', '(', ')', ')'], -3]
        ];
    }

    /**
     * @test
     * @dataProvider directions_with_first_basement_position
     */
    public function it_returns_the_first_basement_direction_position(
        array $directions,
        int $position,
        int $startingFloor = 0
    ): void {
        $this->day1->setDirections($directions);

        $this->assertEquals($position, $this->day1->calculateFirstBasementDirectionPosition($startingFloor));
    }

    /**
     * @return array
     */
    public function directions_with_first_basement_position(): array
    {
        return [
            [[')'], 1],
            [['(', ')', '(', ')', ')'], 5]
        ];
    }
}
