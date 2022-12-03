<?php

final class Game extends GameAbstract
{

	protected const MAX_OUTCOME_SCORE = 6;

	protected const SHAPE_WIN_MAP = array(
		'rock' => 'scissors',
		'paper' => 'rock',
		'scissors' => 'paper',
	);

	protected const STRATEGY_SHAPE_MAP = array(
		'A' => 'rock',
		'B' => 'paper',
		'C' => 'scissors',
	);

	protected const STRATEGY_RESULT_MAP = array(
		'X' => 'lose',
		'Y' => 'draw',
		'Z' => 'win',
	);

	protected const SHAPE_SCORE_MAP = array(
		'rock' => 1,
		'paper' => 2,
		'scissors' => 3,
	);

	/**
	 * @var array<array<string>>
	 */
	protected array $rounds = array();

	protected function prepare_data(string $file_data): void
	{
		$rounds_data = explode(PHP_EOL, $file_data);
		$this->rounds = array_map(function (string $round_data): array {
			$strategies = explode(' ', $round_data);
			return array(
				self::STRATEGY_SHAPE_MAP[$strategies[0]],
				self::STRATEGY_RESULT_MAP[$strategies[1]],
			);
		}, $rounds_data);
	}

	protected function start(): void
	{
		$total_score = 0;
		foreach ($this->rounds as $round) {
			switch ($round[1]) {
				case 'win':
					$shape = array_flip(self::SHAPE_WIN_MAP)[$round[0]];
					break;
				case 'lose':
					$shape = self::SHAPE_WIN_MAP[$round[0]];
					break;
				default:
					$shape = $round[0];
					break;
			}

			$your_shape_score = self::SHAPE_SCORE_MAP[$shape];
			$your_outcome_score = 0; // Loss is default
			if ($round[0] === $shape) {
				$your_outcome_score = self::MAX_OUTCOME_SCORE / 2; // Draw
			} elseif (self::SHAPE_WIN_MAP[$shape] === $round[0]) {
				$your_outcome_score = self::MAX_OUTCOME_SCORE; // Win
			}

			$your_round_score = $your_shape_score + $your_outcome_score;
			$total_score += $your_round_score;
		}

		$this->output->echo_line(
			sprintf('The total score is %d.', $total_score);
		);
	}
}
