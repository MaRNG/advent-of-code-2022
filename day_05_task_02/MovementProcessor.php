<?php

class MovementProcessor
{
    public static function move(Ship $ship, array $singleMoveData): void
    {
        [$cratesCount, $fromStackIdx, $toStackIdx] = $singleMoveData;

        $fromStack = $ship->getStack($fromStackIdx);
        $toStack = $ship->getStack($toStackIdx);

        $crates = $fromStack->getCrates($cratesCount);

        $toStack->addCrates($crates);
    }
}