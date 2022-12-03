<?php

namespace Mentosmenno2\AdventOfCode2022\Lib;

class Outputter
{
	public function echo(string $text = ''): void
	{
		echo $text;
	}

	public function echo_line(string $text = ''): void
	{
		echo $text . $this->get_line_ending();
	}

	protected function get_line_ending(): string
	{
		if (ADVENT_OF_CODE_2022_CLI) {
			return PHP_EOL;
		} else {
			return '<br />';
		}
	}
}
