<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day07\Part1;

interface FilesystemItemInterface
{
	public function get_size(): int;

	public function get_name(): string;
	public function set_name(string $name): void;
}
