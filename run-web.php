<?php

$argv = array(
	1, 1, true
);

// Check if all required arguments are set
if (count($argv) < 3) {
	echo 'Please provide the day and part number as arguments in the terminal command.' . PHP_EOL;
	echo 'For example: php index.php 01 1';
	exit;
}

$classname = sprintf(
	'\\' . ADVENT_OF_CODE_2022_NAMESPACE . 'Answers\\Day%s\\Part%s\\Game',
	str_pad($argv[1], 2, '0', STR_PAD_LEFT),
	(string) intval($argv[2])
);
if ( ! class_exists( $classname ) ) {
	echo 'Day and part number combination does not exist.' . PHP_EOL;
	echo 'Attempted to find class ' . $classname . PHP_EOL;
}

$test_data = filter_var( $argv[3] ?? false, FILTER_VALIDATE_BOOLEAN );
$data_filename = $test_data ? 'example-data.txt' : 'data.txt';
$data_filename = sprintf(
	__DIR__ . '/app/Answers/Day%s/%s',
	str_pad($argv[1], 2, '0', STR_PAD_LEFT),
	$data_filename
);

// Run the game
$game = new $classname($data_filename);
