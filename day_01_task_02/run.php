<?php

require __DIR__ . '/CaloriesCalculator.php';

$elvesCarryingCalories = [];

$handle = fopen(__DIR__ . '/data/input.txt', 'rb');

$elfCarryingCalories = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $trimmedLine = trim($line);

        if ($trimmedLine === '')
        {
            $elvesCarryingCalories[] = $elfCarryingCalories;
            $elfCarryingCalories = [];
        }
        else
        {
            $elfCarryingCalories[] = (int)$trimmedLine;
        }
    }

    fclose($handle);
}

echo CaloriesCalculator::calculate($elvesCarryingCalories);
