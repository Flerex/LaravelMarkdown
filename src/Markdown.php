<?php

namespace Flerex\LaravelMarkdown;

use Parsedown;

class Markdown extends Parsedown {
	
	function __construct()
	{
		$this->InlineTypes['^'][]= 'DropCap';
		$this->inlineMarkerList .= '^';
	}

	public function inlineDropCap($excerpt)
	{

		if (preg_match('/^\^(.{1})/', $excerpt['text'], $matches)) {
			return [
				'extent'  => strlen($matches[0]),
				'element' => [
					'name' => 'span',
					'text' => $matches[1],
					'attributes' => [
						'class' => 'drop-cap',
					],
				],
			];
		}
		
	}

}