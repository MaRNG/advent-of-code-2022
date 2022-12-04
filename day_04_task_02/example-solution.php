<?php

$pairs = [
    ['2-4', '6-8'],
    ['2-3', '4-5'],
    ['5-7', '7-9'],
    ['2-8', '3-7'],
    ['6-6', '4-6'],
    ['2-6', '4-8'],
];

$pairsIncludingAtLeastOneOverlapCount = 0;

foreach ($pairs as [$firstPair, $secondPair]) {
    [$startIntervalFirstPair, $endIntervalFirstPair] = explode('-', $firstPair);
    [$startIntervalSecondPair, $endIntervalSecondPair] = explode('-', $secondPair);

    $firstRange = range((int)$startIntervalFirstPair, (int)$endIntervalFirstPair);
    $secondRange = range((int)$startIntervalSecondPair, (int)$endIntervalSecondPair);

    $includeAtLeastOneOverlap = false;

    if (count($firstRange) >= count($secondRange))
    {
        foreach ($secondRange as $secondRangeNumber) {
            if (in_array($secondRangeNumber, $firstRange, true))
            {
                $includeAtLeastOneOverlap = true;
            }
        }
    }
    else
    {
        foreach ($firstRange as $firstRangeNumber) {
            if (in_array($firstRangeNumber, $secondRange, true))
            {
                $includeAtLeastOneOverlap = true;
            }
        }
    }

    if ($includeAtLeastOneOverlap)
    {
        $pairsIncludingAtLeastOneOverlapCount++;
    }
}

echo $pairsIncludingAtLeastOneOverlapCount;