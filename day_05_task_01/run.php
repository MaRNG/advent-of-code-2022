<?php

require __DIR__ . '/Ship.php';
require __DIR__ . '/Stack.php';
require __DIR__ . '/MovementProcessor.php';

$handle = fopen(__DIR__ . '/data/input.txt', 'rb');

$shipData = [];
$movementData = [];

$parseShipData = true;

if ($handle) {
    $i = 0;

    while (($line = fgets($handle)) !== false) {
        if (trim($line) === '' || ($parseShipData && (str_contains($line, '[') === false || str_contains($line, ']') === false)))
        {
            $parseShipData = false;
            continue;
        }

        if ($parseShipData)
        {
            $columns = str_split($line, 4);

            foreach ($columns as $idx => $column) {
                if (isset($shipData[$idx]) === false)
                {
                    $shipData[$idx] = [];
                }

                if (trim($column) !== '')
                {
                    $shipData[$idx][] = strtr(trim($column), ['[' => '', ']' => '']);
                }
            }
        }
        else
        {
            preg_match('/move (\d+) from (\d+) to (\d+)/', trim($line), $outputRegex);

            $movementData[] = [
                $outputRegex[1],
                $outputRegex[2],
                $outputRegex[3],
            ];
        }
    }

    fclose($handle);
}

foreach ($shipData as $shipStackIdx => $shipStack) {
    $shipData[$shipStackIdx] = array_reverse($shipStack);
}

$ship = new Ship(count($shipData));

foreach ($shipData as $idx => $stackData) {
    $ship->getStack($idx+1)->addCrates($stackData);
}

foreach ($movementData as $singleMoveData) {
    MovementProcessor::move($ship, $singleMoveData);
}

foreach ($ship->getTopCrates() as $topCrate) {
    echo $topCrate;
}