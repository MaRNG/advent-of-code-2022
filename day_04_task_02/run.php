<?php

$handle = fopen(__DIR__ . '/data/input.txt', 'rb');

$pairs = [];

if ($handle) {
    $i = 0;

    while (($line = fgets($handle)) !== false) {
        $trimmedLine = trim($line);

        $pairs[] = explode(',', $trimmedLine);
    }

    fclose($handle);
}

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
