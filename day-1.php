<?php

$file = fopen("changes.txt", "r");
$frequency = 0;
$changes = [];

while (!feof($file)) {
    $change = intval(fgets($file));
    $changes[] = $change;
    $frequency += $change;
}

fclose($file);

echo "Result part one: " . $frequency . "\n";

$changes = array_filter($changes);

$memory = [0];
$frequency = 0;

while (true) {
    foreach ($changes as $change) {
        $frequency += $change;

        if (in_array($frequency, $memory)) {
            echo 'First frequency reached twice: ' . $frequency . PHP_EOL;
            break 2;
        }

        $memory[] = $frequency;
    }
}
