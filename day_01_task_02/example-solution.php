<?php

require __DIR__ . '/CaloriesCalculator.php';

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

echo CaloriesCalculator::calculate($elvesCarryingCalories);