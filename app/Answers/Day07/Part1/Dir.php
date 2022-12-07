<?php

namespace Mentosmenno2\AdventOfCode2022\Answers\Day07\Part1;

final class Dir implements FilesystemItemInterface
{
	protected ?Dir $parent;

	protected string $name;

	/**
	 * @var array<FilesystemItemInterface>
	 */
	protected array $contents;

	/**
	 * @param array<FilesystemItemInterface> $contents
	 */
	public function __construct(?Dir $parent = null, string $name = '', array $contents = array())
	{
		$this->parent = $parent;
		$this->name = $name;
		$this->contents = $contents;
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

	/**
	 * @return array<FilesystemItemInterface>
	 */
	public function get_contents(): array
	{
		return $this->contents;
	}

	/**
	 * @param array<FilesystemItemInterface> $contents
	 */
	public function set_contents(array $contents): void
	{
		$this->contents = $contents;
	}

	public function get_size(): int
	{
		return array_sum(array_map(function (FilesystemItemInterface $item): int {
			return $item->get_size();
		}, $this->contents));
	}
}
