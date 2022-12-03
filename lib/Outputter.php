<?php

class Outputter
{
	public function echo( string $text = '' ): void {
		echo $text;
	}

	public function echo_line( string $text = '' ): void {
		echo $text . $this->get_line_ending();
	}

	protected function get_line_ending(): string {
		if ( php_sapi_name() === 'cli' ) {
			return PHP_EOL;
		} else {
			return '<br />';
		}
	}
}
