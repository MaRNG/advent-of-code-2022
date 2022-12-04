<?php

$pairs = [
    [ '2-4', '6-8' ],
    [ '2-3', '4-5' ],
    [ '5-7', '7-9' ],
    [ '2-8', '3-7' ],
    [ '6-6', '4-6' ],
    [ '2-6', '4-8' ],
];

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
