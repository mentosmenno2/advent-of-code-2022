<?php

// Define constants
define('ADVENT_OF_CODE_2022_NAMESPACE', 'Mentosmenno2\\AdventOfCode2022\\');
define('ADVENT_OF_CODE_2022_ROOT_DIR', __DIR__);
define('ADVENT_OF_CODE_2022_CLI', php_sapi_name() === 'cli');

// Autoload
require_once __DIR__ . '/autoloader.php';

if (ADVENT_OF_CODE_2022_CLI) {
	require_once ADVENT_OF_CODE_2022_ROOT_DIR . '/run-cli.php';
} else {
	require_once ADVENT_OF_CODE_2022_ROOT_DIR . '/run-web.php';
}


// // Check if all required arguments are set
// if (count($argv) < 3) {
// 	echo 'Please provide the day and part number as arguments in the terminal command.' . PHP_EOL;
// 	echo 'For example: php index.php 01 1';
// 	exit;
// }

// // Generate the day index file path
// $day_index_file = sprintf(
// 	__DIR__ . '/answers/day%s/part%s/index.php',
// 	str_pad($argv[1], 2, '0', STR_PAD_LEFT),
// 	(string) intval($argv[2])
// );

// // Check if the day index file exists
// if (! file_exists($day_index_file)) {
// 	echo 'Day and part number combination does not exist.' . PHP_EOL;
// 	echo 'Attempted to open ' . $day_index_file . PHP_EOL;
// }

// // Require the day index file
// require_once $day_index_file;
