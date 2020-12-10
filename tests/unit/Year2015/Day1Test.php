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
    public function it_returns_the_resulting_floor(array $directions, int $result): void
    {
        $this->day1->setDirections($directions);

        $this->assertEquals($result, $this->day1->calculateFloor());
    }

    /**
     * @return array
     */
    public function directions_with_resulting_floor(): array
    {
        return [
            [['(', '(', ')', ')'], 0],
            [['(', ')', '(', ')'], 0],
            [['(', '(', '('], 3],
            [['(', '(', ')', '(', '(', ')', '('], 3],
            [[')', ')', '(', '(', '(', '(', '('], 3],
            [['(', ')', ')'], -1],
            [[')', ')', '('], -1],
            [[')', ')', ')'], -3],
            [[')', '(', ')', ')', '(', ')', ')'], -3]
        ];
    }
}