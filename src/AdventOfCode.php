<?php

require(dirname(__DIR__) . '/vendor/autoload.php');

$options = getopt('y:d:');

try {
    $classname = "\\DaanMooij\\AdventOfCode\\Year{$options['y']}\\Day{$options['d']}";
    if (!class_exists($classname)) {
        throw new Exception("Class does not exist: {$classname}");
    }
    $day = new $classname();

    $day->loadInput();
    $day->solve();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
