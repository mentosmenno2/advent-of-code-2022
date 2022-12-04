<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day04\Part2;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{
	/**
	 * @var array<array<array<int>>>
	 */
	protected $pairs = array();

	protected function prepare_data(string $file_data): void
	{
		$pairs = explode(PHP_EOL, $file_data);
		$this->pairs = array_map(function (string $pair) {
			$pair = explode(',', $pair);
			$a_sections = explode('-', $pair[0]);
			$b_sections = explode('-', $pair[1]);
			return array(
				range((int) $a_sections[0], (int) $a_sections[1]),
				range((int) $b_sections[0], (int) $b_sections[1])
			);
		}, $pairs);
	}

	protected function start(): void
	{
		$count = 0;
		foreach ($this->pairs as $pair) {
			$a_in_b = array_intersect($pair[0], $pair[1]);
			$b_in_a = array_intersect($pair[1], $pair[0]);
			if ($a_in_b || $b_in_a) {
				$count++;
			}
		}

		$this->output->echo_line(
			sprintf('The amount of pairs partially containing eachothers rooms is %d.', $count)
		);
	}
}
