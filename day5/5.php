<?php
ini_set('error_reporting', 0);
$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$data = [];
foreach($input as $line) {
    if (str_starts_with($line, " 1 ")) break;

    $crates = str_split($line, 4);

    foreach($crates as $i => $crate) {
        $value = trim(str_split($crate)[1]);
        if (!empty($value)) $data[$i][] = $value;
    }
}

foreach($input as $line) {
    if (!str_starts_with($line, "move")) continue;
    $line = explode(" ", $line);
    $amount = (int) $line[1];
    $from = (int) $line[3];
    $to = (int) $line[5];

    for ($i = 0; $i < $amount; $i++) {
        $value = $data[$from - 1][0];
        array_unshift($data[$to - 1], $value);
        array_shift($data[$from - 1]);
    }
}

$output = "";

ksort($data);
foreach($data as $stack) {
    $output .= $stack[0];
}

echo $output;
