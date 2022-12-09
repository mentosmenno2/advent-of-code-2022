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
