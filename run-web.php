<?php

$dayNumber = (int) filter_input(INPUT_GET, 'dayNumber', FILTER_VALIDATE_INT);
$partNumber = (int) filter_input(INPUT_GET, 'partNumber', FILTER_VALIDATE_INT);
$useTestData = (bool) filter_input(INPUT_GET, 'useTestData', FILTER_VALIDATE_BOOLEAN);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Advent Of Code 2022</title>
		<link href="//fonts.googleapis.com/css?family=Source+Code+Pro:300&subset=latin,latin-ext" rel="stylesheet" type="text/css">

		<style>
			html, body {
				background-color: #0f0f23;
				color: #cccccc;
				font-family: "Source Code Pro", monospace;
				   font-size: 14pt;
			}

			main {
				margin: 0 auto;
				width: 1200px;
				max-width: 100%;
			}

			h1 {
				text-shadow: 0 0 2px #00cc00, 0 0 5px #00cc00;
			}

			h1, h2, h3, h4, h5 {
				color: #00cc00;
			}

			input, select, textarea {
				background-color: #0f0f23;
				color: #cccccc;
				font-family: "Source Code Pro", monospace;
				   font-size: 14pt;
				border: 1px solid #00cc00;
			}

			button,
			input[type=submit] {
				background-color: #0f0f23;
				color: #cccccc;
				font-family: "Source Code Pro", monospace;
				   font-size: 14pt;
				border: 2px solid #00cc00;
			}

			.form-fields {
				display: flex;
				flex-direction: row;
				flex-wrap: wrap;
				justify-content: flex-start;
				align-items: flex-start;
				align-content: flex-start;
			}

			.form-field {
				margin-right: 10px;
				margin-bottom: 10px;
				display: flex;
				flex-direction: column;
				flex-wrap: nowrap;
				justify-content: flex-start;
				align-items: flex-start;
				align-content: flex-start;
			}
		</style>
	</head>
	<body>
		<main>
			<h1>Advent Of Code 2022</h1>
			<p>Solving puzzles from advent of code 2022 here.</p>

			<h2>Answer select</h2>
			<form action="" method="get">
				<div class="form-fields">
					<fieldset class="form-field">
						<legend><label for="dayNumber">Day number</label></legend>
						<select name="dayNumber" id="dayNumber">
							<?php for ($dayNumberLoop=1; $dayNumberLoop < 25 + 1; $dayNumberLoop++) { ?>
								<option
									value="<?php echo $dayNumberLoop; ?>"
									<?php echo ( $dayNumberLoop === $dayNumber ) ? 'selected="selected"' : ''; ?>
								>
									Day <?php echo $dayNumberLoop; ?>
								</option>
							<?php } ?>
						</select>
					</fieldset>
					<fieldset class="form-field">
						<legend><label for="partNumber">Part number</label></legend>
						<select name="partNumber" id="partNumber">
							<?php for ($partNumberLoop=1; $partNumberLoop < 2 + 1; $partNumberLoop++) { ?>
								<option
									value="<?php echo $partNumberLoop; ?>"
									<?php echo ( $partNumberLoop === $partNumber ) ? 'selected="selected"' : ''; ?>
								>
									Part <?php echo $partNumberLoop; ?>
								</option>
							<?php } ?>
						</select>
					</fieldset>
					<fieldset class="form-field">
						<legend><label for="useTestData">Use test data</label></legend>
						<select name="useTestData" id="useTestData">
							<option
								value="0"
								<?php echo ! $useTestData ? 'selected="selected"' : ''; ?>
							>
								No
							</option>
							<option
								value="1"
								<?php echo $useTestData ? 'selected="selected"' : ''; ?>
							>
								Yes
							</option>
						</select>
					</fieldset>
				</div>
				<div>
					<input type="submit" value="Get answer">
				</div>
			</form>

			<h2>
				Answer
				<?php echo ($dayNumber && $partNumber) ? sprintf('for day %d part %d', $dayNumber, $partNumber) : ''; ?>
			</h2>
			<p>
				<?php
				if ($dayNumber && $partNumber) { // @phpstan-ignore-line
					require_once ADVENT_OF_CODE_2022_ROOT_DIR . '/run-answer.php';
				} else {
					?> Choose a day number and part number to view the answer.<?php
				}
				?>
			</p>
		</main>
	</body>
</html>
