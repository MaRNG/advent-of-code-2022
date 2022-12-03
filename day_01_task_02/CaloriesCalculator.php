<?php

class CaloriesCalculator
{
    public static function calculate(array $elvesCarryingCalories): int
    {
        /** @var array<int> $calories */
        $calories = [];

        foreach ($elvesCarryingCalories as $carriedCalories) {
            $totalCarriedCalories = array_sum($carriedCalories);
            $calories[] = $totalCarriedCalories;
        }

        asort($calories);
        $inverseCalories = array_values(array_reverse($calories));

        /** @var array<int> $topThreeElvesCalories */
        $topThreeElvesCalories = [];

        for ($i = 0; $i < 3; $i++)
        {
            $topThreeElvesCalories[] = $inverseCalories[$i];
        }

        if (empty($topThreeElvesCalories))
        {
            return 0;
        }

        return array_sum($topThreeElvesCalories);
    }
}