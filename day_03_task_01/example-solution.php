<?php

require __DIR__ . '/LetterScoreResolver.php';
require __DIR__ . '/RucksackCompareResolver.php';

$rucksacks = [
    'vJrwpWtwJgWrhcsFMMfFFhFp',
    'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL',
    'PmmdzqPrVvPwwTWBwg',
    'wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn',
    'ttgJtRGJQctTZtZT',
    'CrZsJsPPZsGzwwsLwLmpwMDw'
];

$summedPrioritiesOfSharedItems = 0;

foreach ($rucksacks as $rucksack) {
    $sharedItems = RucksackCompareResolver::getSharedItems($rucksack);

    foreach ($sharedItems as $sharedItem) {
        $summedPrioritiesOfSharedItems += LetterScoreResolver::getInstance()->getLetterPoints($sharedItem);
    }
}

echo $summedPrioritiesOfSharedItems;