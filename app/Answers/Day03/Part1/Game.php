<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day03\Part1;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{
	/**
	 * @var array<array<array<string>>>
	 */
	protected $rucksacks = array();

	protected function prepare_data(string $file_data): void
	{
		$rucksacks_data = explode(PHP_EOL, $file_data);
		$this->rucksacks = array_map(function (string $rucksack_items): array {
			$rucksack_items_array = str_split($rucksack_items);
			$items_count = (int) count($rucksack_items_array);
			return array(
				array_slice($rucksack_items_array, 0, (int) ( $items_count / 2 )),
				array_slice($rucksack_items_array, (int) ($items_count / 2)),
			);
		}, $rucksacks_data);
	}

	protected function start(): void
	{
		$total_priority = 0;
		$alphabet_twice = array_merge(range('a', 'z'), range('A', 'Z'));
		foreach ($this->rucksacks as $rucksack) {
			$common_item = array_values(array_intersect($rucksack[0], $rucksack[1]))[0];
			$common_item_priority = ( (int) array_search($common_item, $alphabet_twice, true) ) + 1;
			$total_priority += $common_item_priority;
		}

		$this->output->echo_line(
			sprintf('The total priority is %d.', $total_priority)
		);
	}
}
