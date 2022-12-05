<?php
//ini_set('error_reporting', 0);
$input = file_get_contents('input.txt');
$input = explode("\n", $input);

$count = 0;
foreach($input as $line) {
    $line = explode(",", $line);
    $range1 =  explode("-", $line[0]);
    $range2 =  explode("-", $line[1]);

    $range1 = range($range1[0], $range1[1]);
    $range2 = range($range2[0], $range2[1]);

    $overlap = array_intersect($range1, $range2);

    if (count($overlap) > 0) {
        $count++;
    }
}

echo $count;