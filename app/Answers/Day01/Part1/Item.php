<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day01\Part1;

final class Item
{
	protected int $calories;

	public function __construct(int $calories)
	{
		$this->calories = $calories;
	}

	public function get_calories(): int
	{
		return $this->calories;
	}

	public function set_calories(int $calories): void
	{
		$this->calories = $calories;
	}
}
