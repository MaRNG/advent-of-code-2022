<?php

class RoundResolver
{
    /**
     * @param ActionEnum $elfMove
     * @param ActionEnum $playerMove
     * @return RoundStateEnum
     */
    public static function resolve(ActionEnum $elfMove, ActionEnum $playerMove): RoundStateEnum
    {
        if (
            ($elfMove === ActionEnum::Paper && $playerMove === ActionEnum::Rock) ||
            ($elfMove === ActionEnum::Rock && $playerMove === ActionEnum::Scissors) ||
            ($elfMove === ActionEnum::Scissors && $playerMove === ActionEnum::Paper)
        )
        {
            return RoundStateEnum::Lose;
        }

        if (
            ($elfMove === ActionEnum::Paper && $playerMove === ActionEnum::Scissors) ||
            ($elfMove === ActionEnum::Rock && $playerMove === ActionEnum::Paper) ||
            ($elfMove === ActionEnum::Scissors && $playerMove === ActionEnum::Rock)
        )
        {
            return RoundStateEnum::Win;
        }

        return RoundStateEnum::Draw;
    }
}