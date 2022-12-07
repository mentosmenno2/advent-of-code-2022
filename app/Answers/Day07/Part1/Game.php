<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day07\Part1;

use Mentosmenno2\AdventOfCode2022\Lib\GameAbstract;

final class Game extends GameAbstract
{
	/**
	 * @var array<string>
	 */
	protected array $terminal_lines = array();
	protected Dir $root_dir;
	protected Dir $current_dir;

	protected function prepare_data(string $file_data): void
	{
		$this->root_dir = new Dir(null, '/');
		$this->current_dir = $this->root_dir;
		$this->terminal_lines = explode(PHP_EOL, $file_data);
		$this->prepare_terminal_line(0);
	}

	protected function start(): void
	{

		$total_size_of_small_dirs = 0;
		$total_size_of_small_dirs = $this->add_dir_content_size($total_size_of_small_dirs, $this->root_dir);

		$this->output->echo_line(
			sprintf('The sum of sizes of small directories is %d.', $total_size_of_small_dirs)
		);
	}

	protected function add_dir_content_size(int $size, Dir $dir): int
	{
		$dir_size = $dir->get_size();
		if ($dir_size <= 100000) {
			$size += $dir_size;
		}

		$items = $dir->get_contents();
		foreach ($items as $item) {
			if ($item instanceof Dir) {
				$size = $this->add_dir_content_size($size, $item);
			}
		}
		return $size;
	}

	protected function prepare_terminal_line(int $line_number): void
	{
		$line = $this->terminal_lines[$line_number] ?? null;
		if (! $line) {
			return;
		}

		$next_line_number = $line_number+1;
		$next_line = $this->terminal_lines[$next_line_number] ?? null;

		// LS command
		if (strpos($line, '$ ls') === 0) {
			while ($next_line && strpos($next_line, '$ ') !== 0) {
				$current_contents = $this->current_dir->get_contents();
				if (strpos($next_line, 'dir ') === 0) {
					$current_contents[] = new Dir($this->current_dir, substr($next_line, 4));
				} else {
					$file_parts = explode(' ', $next_line);
					$size = (int) array_shift($file_parts);
					$name = implode('', $file_parts);
					$current_contents[] = new File($this->current_dir, $name, $size);
				}
				$this->current_dir->set_contents($current_contents);
				$next_line_number++;
				$next_line = $this->terminal_lines[$next_line_number] ?? null;
			}
		}

		// CD command
		if (strpos($line, '$ cd ') === 0) {
			$dirname = substr($line, 5);
			if ($dirname === '/') {
				$this->current_dir = $this->root_dir;
			} elseif ($dirname === '..') {
				/** @var Dir $parent_dir */
				$parent_dir = $this->current_dir->get_parent();
				$this->current_dir = $parent_dir;
			} else {
				$contents = $this->current_dir->get_contents();
				foreach ($contents as $content) {
					if ($content instanceof Dir && $content->get_name() === $dirname) {
						$this->current_dir = $content;
						break;
					}
				}
			}
		}

		$this->prepare_terminal_line($next_line_number);
	}
}
