<?php

require __DIR__ . '/Ship.php';
require __DIR__ . '/Stack.php';
require __DIR__ . '/MovementProcessor.php';

$shipData = [
    ['Z', 'N'],
    ['M', 'C', 'D'],
    ['P'],
];

/**
move 1 from 2 to 1
move 3 from 1 to 3
move 2 from 2 to 1
move 1 from 1 to 2
 */
$movementData = [
    ['1', '2', '1'],
    ['3', '1', '3'],
    ['2', '2', '1'],
    ['1', '1', '2'],
];

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