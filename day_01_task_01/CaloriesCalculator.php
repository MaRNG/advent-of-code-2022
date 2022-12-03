<?php

class CaloriesCalculator
{
    public static function calculate(array $elvesCarryingCalories): int
    {
        $mostCalories = null;

        foreach ($elvesCarryingCalories as $carriedCalories) {
            $totalCarriedCalories = array_sum($carriedCalories);

            if ($mostCalories === null || $mostCalories < $totalCarriedCalories)
            {
                $mostCalories = $totalCarriedCalories;
            }
        }

        return $mostCalories ?? 0;
    }
}