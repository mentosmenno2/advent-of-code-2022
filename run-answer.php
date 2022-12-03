<?php

/**
 * @var string $dayNumber
 * @var string $partNumber
 * @var bool $useTestData
 */

$classname = sprintf(
	'\\' . ADVENT_OF_CODE_2022_NAMESPACE . 'Answers\\Day%s\\Part%s\\Game',
	str_pad($dayNumber, 2, '0', STR_PAD_LEFT),
	(string) intval($partNumber)
);
if (! class_exists($classname)) {
	echo 'Day and part number combination does not exist.' . PHP_EOL;
	echo 'Attempted to find class ' . $classname . '.' .  PHP_EOL;
} else {
	$dataFilename = $useTestData ? 'example-data.txt' : 'data.txt';
	$dataFilename = sprintf(
		__DIR__ . '/app/Answers/Day%s/%s',
		str_pad($dayNumber, 2, '0', STR_PAD_LEFT),
		$dataFilename
	);

	// Run the game
	$game = new $classname($dataFilename);
}
