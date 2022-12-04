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

$pairsIncludingAllIntervalCount = 0;

foreach ($pairs as [$firstPair, $secondPair]) {
    [$startIntervalFirstPair, $endIntervalFirstPair] = explode('-', $firstPair);
    [$startIntervalSecondPair, $endIntervalSecondPair] = explode('-', $secondPair);

    $firstRange = range((int)$startIntervalFirstPair, (int)$endIntervalFirstPair);
    $secondRange = range((int)$startIntervalSecondPair, (int)$endIntervalSecondPair);

    $includeAll = true;

    if (count($firstRange) >= count($secondRange))
    {
        foreach ($secondRange as $secondRangeNumber) {
            if (in_array($secondRangeNumber, $firstRange, true) === false)
            {
                $includeAll = false;
            }
        }
    }
    else
    {
        foreach ($firstRange as $firstRangeNumber) {
            if (in_array($firstRangeNumber, $secondRange, true) === false)
            {
                $includeAll = false;
            }
        }
    }

    if ($includeAll)
    {
        $pairsIncludingAllIntervalCount++;
    }
}

echo $pairsIncludingAllIntervalCount;
