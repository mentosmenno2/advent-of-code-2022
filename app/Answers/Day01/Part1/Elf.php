<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day01\Part1;

final class Elf
{

	/**
	 * @var Item[]
	 */
	protected $items;

	/**
	 * @param Item[] $items
	 */
	public function __construct(array $items)
	{
		$this->items = $items;
	}

	/**
	 * @return Item[] $items
	 */
	public function get_items(): array
	{
		return $this->items;
	}

	/**
	 * @param Item[] $items
	 * @return void
	 */
	public function set_items(array $items): void
	{
		$this->items = $items;
	}

	public function get_total_items_calories(): int
	{
		$calories = array_map(function (Item $item): int {
			return $item->get_calories();
		}, $this->items);
		return array_sum($calories);
	}
}
