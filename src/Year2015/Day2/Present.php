<?php

namespace DaanMooij\AdventOfCode\Year2015\Day2;

use Exception;

class Present
{
    private int $height;
    private int $width;
    private int $length;

    public function __construct(int $height, int $width, int $length)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public static function fromString(string $dimensions): Present
    {
        list($height, $width, $length) = explode('x', $dimensions);

        return new Present(intval($height), intval($width), intval($length));
    }

    /** @return array<int> */
    public function getSortedDimensions(): array
    {
        $dimensions = [$this->height, $this->width, $this->length];
        sort($dimensions);

        return $dimensions;
    }

    public function getVolume(): int
    {
        return $this->height * $this->width * $this->length;
    }

    public function getSmallestSide(): int
    {
        $sortedDimensions = $this->getSortedDimensions();
        $smallestSide = reset($sortedDimensions);
        if (!is_int($smallestSide)) {
            throw new Exception('Could not get smallest side');
        }

        return $smallestSide;
    }

    public function getSecondSmallestSide(): int
    {
        $dimensions = $this->getSortedDimensions();
        array_shift($dimensions);
        $secondSmallestSide = reset($dimensions);
        if (!is_int($secondSmallestSide)) {
            throw new Exception('Could not get second smallest side');
        }

        return $secondSmallestSide;
    }

    public function getSurfaceArea(): int
    {
        $surfaceArea = (2 * $this->length * $this->width)
            + (2 * $this->width * $this->height)
            + (2 * $this->height * $this->length);

        return $surfaceArea;
    }

    public function getSmallestSideArea(): int
    {
        $dimensions = $this->getSortedDimensions();
        $smallestSide = array_shift($dimensions);
        $secondSmallestSide = array_shift($dimensions);

        return $smallestSide * $secondSmallestSide;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->length;
    }
}
