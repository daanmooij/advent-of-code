<?php

$file = fopen("changes.txt", "r");
$frequency = 0;

while (!feof($file)) {
    $frequency += intval(fgets($file));
}

echo "Result: " . $frequency . "\n";

fclose($file);
