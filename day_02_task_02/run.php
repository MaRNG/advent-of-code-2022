<?php


require __DIR__ . '/ActionEnum.php';
require __DIR__ . '/RoundStateEnum.php';
require __DIR__ . '/RoundResolver.php';

$handle = fopen(__DIR__ . '/data/input.txt', 'rb');

$strategyGuideRows = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $trimmedLine = trim($line);
        $explodedLine = explode(' ', $trimmedLine);

        $strategyGuideRows[] = [$explodedLine[0], $explodedLine[1]];
    }

    fclose($handle);
}

$sumScore = 0;

foreach ($strategyGuideRows as [$elfMoveCode, $playerNeedRoundStateCode]) {
    $elfMove = ActionEnum::getActionByElfActionCode($elfMoveCode);
    $playerMove = $elfMove->getActionToDraw();

    switch ($playerNeedRoundStateCode)
    {
        case 'X':
            $playerMove = $elfMove->getActionToLose();
            break;
        case 'Z':
            $playerMove = $elfMove->getActionToWin();
            break;
    }

    $roundState = RoundResolver::resolve(ActionEnum::getActionByElfActionCode($elfMoveCode), $playerMove);

    $sumScore += $roundState->getPoints() + $playerMove->getPointsByAction();
}

echo $sumScore;