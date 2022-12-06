<?php
$input = str_split(file_get_contents('input.txt'));

// Part 1 = 4, part 2 = 14
$length = 4;

for ($i = 0; $i <= sizeof($input) - $length; $i++) {
    $data = array_unique(array_slice($input, $i, $length));
    if (sizeof($data) === $length) {
        echo $i + $length . PHP_EOL;
        break;
    }
}