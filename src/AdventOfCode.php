<?php

require(dirname(__DIR__) . '/vendor/autoload.php');

try {
    $options = getopt('y:d:');
    if (!is_array($options) || (!isset($options['y']) || !isset($options['d']))) {
        throw new Exception("Provide a year -y and a day -d");
    }

    $year = is_string($options['y']) ? $options['y'] : '';
    $day = is_string($options['d']) ? $options['d'] : '';

    $classname = "\\DaanMooij\\AdventOfCode\\Year{$year}\\Day{$day}";
    if (!class_exists($classname)) {
        throw new Exception("Class does not exist: {$classname}");
    }
    $day = new $classname();

    $day->loadInput();
    $day->solve();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
