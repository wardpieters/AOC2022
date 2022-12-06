<?php
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$input = str_split($input[0]);

// Part 1 = 4, part 2 = 14
$length = 4;

for ($i = 0; $i <= sizeof($input) - $length; $i++) {
    $data = array_unique(array_slice($input, $i, $length));
    if (sizeof($data) === $length) {
        echo $i + $length . PHP_EOL;
        break;
    }
}