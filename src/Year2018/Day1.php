<?php

namespace DaanMooij\AdventOfCode\Year2018;

class Day1
{
    /**
     * @var array
     */
    private array $changes;

    /**
     * @param array $changes
     */
    public function __construct(array $changes)
    {
        $this->changes = $changes;
    }

    /**
     * @param string $filePath
     * @return Day1
     */
    public static function fromFile(string $filePath)
    {
        $changes = [];

        $file = fopen(__DIR__ . $filePath, "r");
        while (!feof($file)) {
            $changes[] = intval(fgets($file));
        }
        fclose($file);

        return new Day1($changes);
    }

    /**
     * @param int $frequency
     * @return int
     */
    public function getFrequency(int $frequency): int
    {
        foreach ($this->changes as $change) {
            $frequency += $change;
        }

        return $frequency;
    }

    /**
     * @param int $frequency
     * @return int
     */
    public function getFrequencyReachedTwice(int $frequency): int
    {
        $memory = [$frequency => 1];

        $found = false;
        while (!$found) {
            foreach ($this->changes as $change) {
                $frequency += $change;

                if (isset($memory[$frequency])) {
                    $found = true;
                    break;
                }

                $memory[$frequency] = 1;
            }
        }

        return $frequency;
    }
}
