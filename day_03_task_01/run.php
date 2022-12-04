<?php

require __DIR__ . '/LetterScoreResolver.php';
require __DIR__ . '/RucksackCompareResolver.php';

$handle = fopen(__DIR__ . '/data/input.txt', 'rb');

$rucksacks = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $trimmedLine = trim($line);
        $rucksacks[] = $trimmedLine;
    }

    fclose($handle);
}

$summedPrioritiesOfSharedItems = 0;

foreach ($rucksacks as $rucksack) {
    $sharedItems = RucksackCompareResolver::getSharedItems($rucksack);

    foreach ($sharedItems as $sharedItem) {
        $summedPrioritiesOfSharedItems += LetterScoreResolver::getInstance()->getLetterPoints($sharedItem);
    }
}

echo $summedPrioritiesOfSharedItems;