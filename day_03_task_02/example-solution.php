<?php

require __DIR__ . '/LetterScoreResolver.php';
require __DIR__ . '/GroupBadgeResolver.php';

$elfGroups = [
    [
        'vJrwpWtwJgWrhcsFMMfFFhFp',
        'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL',
        'PmmdzqPrVvPwwTWBwg',
    ],
    [
        'wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn',
        'ttgJtRGJQctTZtZT',
        'CrZsJsPPZsGzwwsLwLmpwMDw'
    ]
];

$summedPrioritiesOfSharedItems = 0;

foreach ($elfGroups as $elfGroup) {
    $groupBadge = GroupBadgeResolver::getBadge($elfGroup);

    $summedPrioritiesOfSharedItems += LetterScoreResolver::getInstance()->getLetterPoints($groupBadge);
}

echo $summedPrioritiesOfSharedItems;