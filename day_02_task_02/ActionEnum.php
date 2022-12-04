<?php

enum ActionEnum
{
    case Rock;
    case Paper;
    case Scissors;

    public function getElfActionCode(): string
    {
        return match ($this)
        {
            self::Rock => 'A',
            self::Paper => 'B',
            self::Scissors => 'C',
        };
    }

    public function getPlayerActionCode(): string
    {
        return match ($this)
        {
            self::Rock => 'X',
            self::Paper => 'Y',
            self::Scissors => 'Z',
        };
    }

    public static function getActionByPlayerActionCode(string $playerActionCode): self
    {
        return match ($playerActionCode)
        {
            self::Rock->getPlayerActionCode() => self::Rock,
            self::Paper->getPlayerActionCode() => self::Paper,
            self::Scissors->getPlayerActionCode() => self::Scissors,
        };
    }

    public static function getActionByElfActionCode(string $elfActionCode): self
    {
        return match ($elfActionCode)
        {
            self::Rock->getElfActionCode() => self::Rock,
            self::Paper->getElfActionCode() => self::Paper,
            self::Scissors->getElfActionCode() => self::Scissors,
        };
    }

    public function getPointsByAction(): int
    {
        return match ($this)
        {
            self::Rock => 1,
            self::Paper => 2,
            self::Scissors => 3,
        };
    }

    public function getActionToLose(): self
    {
        return match ($this)
        {
            self::Rock => self::Scissors,
            self::Paper => self::Rock,
            self::Scissors => self::Paper,
        };
    }

    public function getActionToDraw(): self
    {
        return $this;
    }

    public function getActionToWin(): self
    {
        return match ($this)
        {
            self::Rock => self::Paper,
            self::Paper => self::Scissors,
            self::Scissors => self::Rock,
        };
    }
}