<?php

require(dirname(__DIR__) . '/vendor/autoload.php');

$options = getopt('y:d:');

$classname = "\\DaanMooij\\AdventOfCode\\Year{$options['y']}\\Day{$options['d']}";
$day = new $classname();
$day->loadInput();
$day->solve();
