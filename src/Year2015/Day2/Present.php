<?php

namespace DaanMooij\AdventOfCode\Year2015\Day2;

class Present
{
    /** @var int */
    private int $height;

    /** @var int */
    private int $width;

    /** @var int */
    private int $length;

    /**
     * @param int $height
     * @param int $width
     * @param int $length
     */
    public function __construct(int $height, int $width, int $length)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    /**
     * @param string $dimensions
     * @return Present
     */
    public static function fromString(string $dimensions): Present
    {
        list($height, $width, $length) = explode('x', $dimensions);
        return new Present(intval($height), intval($width), intval($length));
    }

    /** @return int */
    public function getSurfaceArea(): int
    {
        $surfaceArea = (2 * $this->length * $this->width)
            + (2 * $this->width * $this->height)
            + (2 * $this->height * $this->length);

        return $surfaceArea;
    }

    /** @return int */
    public function getSmallestSideArea(): int
    {
        $dimensions = [$this->height, $this->width, $this->length];
        sort($dimensions);
        $smallestSide = array_shift($dimensions);
        $secondSmallestSide = array_shift($dimensions);

        return $smallestSide * $secondSmallestSide;
    }
}
