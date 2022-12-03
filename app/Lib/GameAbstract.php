<?php

namespace Mentosmenno2\AdventOfCode2022\Lib;

abstract class GameAbstract
{

	protected Outputter $output;

	public function __construct(string $data_file)
	{
		$this->output = new Outputter();

		$file_data = file_get_contents($data_file);
		if (! $file_data) {
			return;
		}

		$this->prepare_data($file_data);
		$this->start();
	}

	/**
	 * Prepares and processes data from the input file.
	 * Should set class varables with the prepared data.
	 *
	 * @param string $file_data
	 * @return void
	 */
	abstract protected function prepare_data(string $file_data): void;

	/**
	 * Starts the game
	 */
	abstract protected function start(): void;
}
