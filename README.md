
[![GitHub Actions status](https://github.com/mentosmenno2/advent-of-code-2022/workflows/Build%20%26%20test/badge.svg)](https://github.com/mentosmenno2/advent-of-code-2022/actions)

# Advent Of Code 2022

I'm attempting to solve puzzles from advent of code 2022.

https://adventofcode.com/2022

I use the PHP language for solving these puzzles.

## Calculating an answer

To calculate an answer, run the following command in your command line interface, from the repo root:

```sh
php index.php [dayNumber] [partNumber]
```

## Folder structure

Every folder within the `answers` folder, represents the day number of the puzzle.
Inside every day folder, there will be a separation between part 1 and part 2 of the puzzle.

Every day in the `answers` folder consists of the following folder structure:

- `day{dayNumber}` - Contains all code for the assignment of the day.
  - `part{partNumber}` - Contains all code for an assignment part.
    - `Game.php` - The actual class that should output the answer of the assignment.
    - `index.php` - Starting point of an assignment part. Loads all required files and initiates the game.
    - `??????.php` - Extra classes to make better OOP logic.
  - `data.txt` - Contains real puzzle input.
  - `example-data.txt` - Contains example puzzle input.

Then finally we have the `lib` folder, which contains some default classes that are useful.
