<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day06\Part1;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{
	/**
	 * @var array<string>
	 */
	protected array $stream = array();

	protected function prepare_data(string $file_data): void
	{
		$this->stream = str_split($file_data);
	}

	protected function start(): void
	{
		$items_count = count($this->stream);
		for ($i=3; $i < $items_count; $i++) {
			$four_items = array_slice($this->stream, $i, 4);
			if (count(array_unique($four_items)) === 4) {
				break;
			}
		}

		$this->output->echo_line(
			sprintf('The amount of characters that need to be processed before the first start-of-packet marker is detected is %d.', $i + 4)
		);
	}
}
