<?php

require __DIR__ . '/ActionEnum.php';
require __DIR__ . '/RoundStateEnum.php';
require __DIR__ . '/RoundResolver.php';

$strategyGuide = [
    'A' => 'Y',
    'B' => 'X',
    'C' => 'Z',
];

$sumScore = 0;

foreach ($strategyGuide as $elfMoveCode => $playerMoveCode) {
    $playerMove = ActionEnum::getActionByPlayerActionCode($playerMoveCode);

    $roundState = RoundResolver::resolve(ActionEnum::getActionByElfActionCode($elfMoveCode), $playerMove);

    $sumScore += $roundState->getPoints() + $playerMove->getPointsByAction();
}

echo $sumScore;