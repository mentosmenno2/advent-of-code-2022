<?php

final class Game extends GameAbstract
{

	/**
	 * @var Elf[]
	 */
	protected $elves;

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
		$all_elf_calories = array_map(function (Elf $elf): int {
			return $elf->get_total_items_calories();
		}, $this->elves);

		rsort($all_elf_calories);
		$largest_three = array_slice($all_elf_calories, 0, 3);

		$this->output->echo_line(
			sprintf(
				'The elves carrying the most calories are carrying %s calories. Together they carry a total of %d calories.',
				implode(', ', $largest_three),
				array_sum($largest_three)
			)
		);
	}
}
