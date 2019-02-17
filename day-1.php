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

$memory = [0 => 1];

$found = false;
while (!$found) {
    foreach ($changes as $change) {
        $frequency += $change;

        if (isset($memory[$frequency])) {
            echo 'First frequency reached twice: ' . $frequency . PHP_EOL;
            $found = true;
            break;
        }

        $memory[$frequency] = 1;
    }
}
