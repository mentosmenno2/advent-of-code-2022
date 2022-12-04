<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day03\Part2;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{
	/**
	 * @var array<array<array<string>>>
	 */
	protected $groups = array();

	protected function prepare_data(string $file_data): void
	{
		$rucksacks_data = explode(PHP_EOL, $file_data);
		$rucksacks_data = array_map(function (string $rucksack_items): array {
			return str_split($rucksack_items);
		}, $rucksacks_data);
		$this->groups = array_chunk($rucksacks_data, 3);
	}

	protected function start(): void
	{
		$total_priority = 0;
		$alphabet_twice = array_merge(range('a', 'z'), range('A', 'Z'));
		foreach ($this->groups as $group) {
			$common_item = array_values(array_intersect($group[0], $group[1], $group[2]))[0];
			$common_item_priority = ( (int) array_search($common_item, $alphabet_twice, true) ) + 1;
			$total_priority += $common_item_priority;
		}

		$this->output->echo_line(
			sprintf('The total priority is %d.', $total_priority)
		);
	}
}
