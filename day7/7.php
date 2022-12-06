<?php
ini_set('error_reporting', 0);
$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$data = [];
$count = 0;

foreach($input as $line) {
    var_dump($line);

    if (true) {
        $count++;
    }
}

echo "Total: $count";
