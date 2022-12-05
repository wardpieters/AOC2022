<?php
ini_set('error_reporting', 0);
$input = file_get_contents('input.txt');
$input = explode("\n", $input);

$total = 0;
foreach($input as $rucksack) {
    $middle = strlen($rucksack) / 2;
    $first = substr($rucksack, 0, $middle);
    $last = substr($rucksack, $middle);

    $data1 = [];
    foreach (str_split($first) as $char) {
        $data1[$char]++;
    }

    $data2 = [];
    foreach (str_split($last) as $char) {
        $data2[$char]++;
    }

    $data = array_intersect_key($data1, $data2);

    $prio = get_priority(key($data));
    $total += $prio;
}

echo $total;

function get_priority($char) {
    $alphabet = range('A', 'Z');
    return (array_search(strtoupper($char), $alphabet) + 1) + (ctype_upper($char) ? 26 : 0);
}