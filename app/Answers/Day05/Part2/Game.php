<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day05\Part2;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{
	/**
	 * @var array<array<string>>
	 */
	protected $stacks = array();

	/**
	 * @var array<array<string>>
	 */
	protected $steps = array();

	protected function prepare_data(string $file_data): void
	{
		$raw_data = explode(PHP_EOL . PHP_EOL, $file_data);
		$stacks_data = $raw_data[0];
		$inverted_stacks_data = array_reverse(explode(PHP_EOL, $stacks_data));
		$stacks_numbers_data = array_shift($inverted_stacks_data);
		$stacks_numbers_array_keys = array_filter(str_split($stacks_numbers_data), function (string $col): bool {
			return $col !== ' ';
		});

		foreach ($inverted_stacks_data as $stacks_row_data) {
			$stacks_row_chars = str_split($stacks_row_data);
			foreach ($stacks_numbers_array_keys as $stacks_numbers_array_key => $stacks_numbers_array_stack_number) {
				if (isset($stacks_row_chars[$stacks_numbers_array_key]) && trim($stacks_row_chars[$stacks_numbers_array_key])) {
					$this->stacks[$stacks_numbers_array_stack_number][] = $stacks_row_chars[$stacks_numbers_array_key];
				}
			}
		}

		$steps_data = $raw_data[1];
		$steps_data_rows = explode(PHP_EOL, $steps_data);
		foreach ($steps_data_rows as $steps_data_row) {
			$steps_data_row_parts = explode(' ', $steps_data_row);
			$steps_data_row_numbers = array_values(array_filter($steps_data_row_parts, function (string $part): bool {
				return is_numeric($part);
			}));
			$this->steps[] = array(
				'boxes' => $steps_data_row_numbers[0],
				'from' => $steps_data_row_numbers[1],
				'to' => $steps_data_row_numbers[2],
			);
		}
	}

	protected function start(): void
	{
		foreach ($this->steps as $step) {
			$boxes_to_move = array_splice($this->stacks[$step['from']], -((int)$step['boxes']));
			$this->stacks[$step['to']] = array_merge($this->stacks[$step['to']], $boxes_to_move);
		}

		$boxes_on_top = array();
		foreach ($this->stacks as $stack) {
			$boxes_on_top[] = end($stack);
		}

		$this->output->echo_line(
			sprintf('The boxes on top are %s.', implode('', $boxes_on_top))
		);
	}
}
