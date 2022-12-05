<?php
//ini_set('error_reporting', 0);
$data = file_get_contents('input.txt');
$data = explode("\n", $data);

$total = 0;
foreach ($data as $row) {
    $row = explode(" ", $row);
    $opponent = $row[0];
    $me = $row[1];

    $score = get_score($me, $opponent);
    $total += $score;
}

var_dump($total);

function get_score($p1, $p2)
{
    // X A = Rock
    // Y B = Paper
    // Z C = Scissors

    $output = 0;

    // Draw
    if (($p1 === "X" && $p2 === "A") ||
        ($p1 === "Y" && $p2 === "B") ||
        ($p1 === "Z" && $p2 === "C")) {
        $output = 3;
    }

    // Win - Rock/Scissors
    if ($p1 === "X" && $p2 === "C") $output = 6;

    // Win - Paper/Rock
    if ($p1 === "Y" && $p2 === "A") $output = 6;

    // Win - Scissors/Paper
    if ($p1 === "Z" && $p2 === "B") $output = 6;

    $output += get_method_score($p1);

    return $output;
}

function get_method_score($p1)
{
    switch ($p1) {
        case "X":
            return 1;
        case "Y":
            return 2;
        case "Z":
            return 3;
        default:
            break;
    }
}