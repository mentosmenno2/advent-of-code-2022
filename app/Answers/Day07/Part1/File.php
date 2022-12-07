<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day07\Part1;

final class File implements FilesystemItemInterface
{
	protected Dir $parent;
	protected string $name;
	protected int $size;

	public function __construct(Dir $parent, string $name, int $size)
	{
		$this->parent = $parent;
		$this->name = $name;
		$this->size = $size;
	}

	public function get_parent(): ?Dir
	{
		return $this->parent;
	}

	public function get_name(): string
	{
		return $this->name;
	}

	public function set_name(string $name): void
	{
		$this->name = $name;
	}

	public function get_size(): int
	{
		return $this->size;
	}

	public function set_size(int $size): void
	{
		$this->size = $size;
	}
}
