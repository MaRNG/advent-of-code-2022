<?php

$elvesCarryingCalories = [
	[
		1000,
		2000,
		3000
	],
	[
		4000
	],
	[
		5000,
		6000
	],
	[
		7000,
		8000,
		9000
	],
	[
		10000
	]
];

$mostCalories = null;

foreach ($elvesCarryingCalories as $carriedCalories) {
	$totalCarriedCalories = array_sum($carriedCalories);
	
	if ($mostCalories === null || $mostCalories < $totalCarriedCalories)
	{
		$mostCalories = $totalCarriedCalories;
	}
}

echo $mostCalories;
