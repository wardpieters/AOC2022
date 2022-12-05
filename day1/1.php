<?php
ini_set('error_reporting', 0);
$data = file_get_contents('input.txt');
$data = explode("\n", $data);

$elf_data = [];

$i = 0;
foreach($data as $k => $row) {
    if ($row == "") $i++;
    $elf_data[$i] += (int) $row;
}

echo max($elf_data) . PHP_EOL;

rsort($elf_data);

echo ($elf_data[0] + $elf_data[1] + $elf_data[2]) . PHP_EOL;