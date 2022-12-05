<?php
ini_set('error_reporting', 0);
$input = file_get_contents('input.txt');
$input = explode("\n", $input);

$length = sizeof($input);

$total = 0;
for ($i = 0; $i < $length; $i += 3) {
    $first = $input[$i];
    $middle = $input[$i + 1];
    $last = $input[$i + 2];

    $data1 = [];
    foreach (str_split($first) as $char) {
        $data1[$char]++;
    }

    $data2 = [];
    foreach (str_split($middle) as $char) {
        $data2[$char]++;
    }

    $data3 = [];
    foreach (str_split($last) as $char) {
        $data3[$char]++;
    }

    $data = array_intersect_key($data1, $data2, $data3);

    $prio = get_priority(key($data));
    $total += $prio;
}

echo $total;

function get_priority($char) {
    $alphabet = range('A', 'Z');
    return (array_search(strtoupper($char), $alphabet) + 1) + (ctype_upper($char) ? 26 : 0);
}