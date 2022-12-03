<?php

// Check if all required arguments are set
if (count($argv) < 3) {
	echo 'Please provide the day and part number as arguments in the terminal command.' . PHP_EOL;
	echo 'For example: php index.php 01 1';
	exit;
}

$dayNumber = $argv[1];
$partNumber = $argv[2];
$useTestData = filter_var($argv[3] ?? false, FILTER_VALIDATE_BOOLEAN);

require_once ADVENT_OF_CODE_2022_ROOT_DIR . '/run-answer.php';
