<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day01\Part1;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{

	/**
	 * @var Elf[]
	 */
	protected $elves = array();

	protected function prepare_data(string $file_data): void
	{
		$elves_data = explode(PHP_EOL . PHP_EOL, $file_data);
		$this->elves = array_map(function (string $elf_data): Elf {
			$items_data = explode(PHP_EOL, $elf_data);
			$items = array_map(function (string $item_data): Item {
				return new Item((int) $item_data);
			}, $items_data);
			return new Elf($items);
		}, $elves_data);
	}

	protected function start(): void
	{
		$largest_elf = null;
		foreach ($this->elves as $elf) {
			if (! $largest_elf || $elf->get_total_items_calories() > $largest_elf->get_total_items_calories()) {
				$largest_elf = $elf;
			}
		}

		/** @var Elf $largest_elf */
		$this->output->echo_line(
			sprintf('The elf carrying the most calories is carrying %d calories.', $largest_elf->get_total_items_calories())
		);
	}
}
