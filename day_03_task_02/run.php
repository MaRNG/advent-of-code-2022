<?php

require __DIR__ . '/LetterScoreResolver.php';
require __DIR__ . '/GroupBadgeResolver.php';

$handle = fopen(__DIR__ . '/data/input.txt', 'rb');

$elfGroups = [];

if ($handle) {
    $i = 0;
    $elfGroup = [];

    while (($line = fgets($handle)) !== false) {
        $trimmedLine = trim($line);
        $elfGroup[] = $trimmedLine;

        if ($i === 2)
        {
            $elfGroups[] = $elfGroup;
            $elfGroup = [];

            $i = 0;
        }
        else
        {
            $i++;
        }
    }

    fclose($handle);
}

$summedPrioritiesOfSharedItems = 0;

foreach ($elfGroups as $elfGroup) {
    $groupBadge = GroupBadgeResolver::getBadge($elfGroup);

    $summedPrioritiesOfSharedItems += LetterScoreResolver::getInstance()->getLetterPoints($groupBadge);
}

echo $summedPrioritiesOfSharedItems;