<?php

// Check if all required arguments are set
if (count($argv) < 3) {
	echo 'Please provide the day and part number as arguments in the terminal command.' . PHP_EOL;
	echo 'For example: php index.php 01 1';
	exit;
}

// Generate the day index file path
$day_index_file = sprintf(
	__DIR__ . '/answers/day%s/part%s/index.php',
	str_pad($argv[1], 2, '0', STR_PAD_LEFT),
	(string) intval($argv[2])
);

// Check if the day index file exists
if (! file_exists($day_index_file)) {
	echo 'Day and part number combination does not exist.' . PHP_EOL;
	echo 'Attempted to open ' . $day_index_file . PHP_EOL;
}

// Require all required libs
require_once __DIR__ . '/lib/GameAbstract.php';

// Require the day index file
require_once $day_index_file;
