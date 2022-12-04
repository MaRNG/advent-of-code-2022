<?php

enum RoundStateEnum
{
    case Win;
    case Lose;
    case Draw;

    public function getPoints(): int
    {
        return match ($this)
        {
            self::Win => 6,
            self::Draw => 3,
            self::Lose => 0
        };
    }
}
